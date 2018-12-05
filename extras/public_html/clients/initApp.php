<?php
  if ($_SERVER['REQUEST_METHOD'] !== 'POST') return FALSE;
  if (!isset($_POST['functions'])) return FALSE;
  // Include functions
  require_once '../../includes/user_functions.php';

  if (!is_sec_session_started()) sec_session_start();

  require_once '../../includes/api_config.php';
  require_once '../../vendor/autoload.php';

  use rjdeliveryomaha\courierinvoice\Ticket;
  use rjdeliveryomaha\courierinvoice\Route;
  $returnData = [];
  $functions = [];
  if (is_array($_POST['functions'])) {
    for ($i = 0; $i < count($_POST['functions']); $i++) {
      $functions[] = test_input($_POST['functions'][$i]);
    }
  } else {
    $functions[] = test_input($_POST['functions']);
  }
  try {
    $ticket = new Ticket($config, $_POST);
  } catch(Exception $e) {
    echo "<span data-value=\"error\">{$e->getMessage()}</span>";
    return FALSE;
  }

  for ($i = 0; $i < count($functions); $i++) {
    if (method_exists($ticket, $functions[$i])) {
      try {
        $returnData[] = $ticket->{$functions[$i]}();
      }catch(Exception $e) {
        $returnData[] = $e->getMessage();
      }
    } elseif (function_exists($functions[$i])) {
      $returnData[] = $functions[$i]();
    } else {
      $returnData[] = FALSE;
    }
  }

  echo json_encode($returnData, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT);
  return FALSE;
