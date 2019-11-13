<?php
  require_once ('../config.php');
  require_once (DBAPI);
  
  $customers = null;
  $customer  = null;

  //listagem de clientes
  /**	 *  Listagem de Clientes	 */	
  function index() {
    //acessa a variavel customers fora do escopo
    global $customers;
    $customers = find_all('customers');
  }
  function add() {
    //se o post nao estiver vazio entra no if
    if (!empty($_POST['customer'])) {
      $today = date_create('now', new DateTimeZone('America/Sao_Paulo'));
      $customer = $_POST['customer'];
      $customer['modified'] = $customer['created'] = $today->format("Y-m-d H:i:s");
      save('customers', $customer);
      header('location: index.php');	  
    }
  }
  function edit() {
    $now = date_create('now', new DateTimeZone('America/Sao_Paulo'));
  
    if (isset($_GET['id'])) {
      $id = $_GET['id'];
      
      if (isset($_POST['customer'])) {
        $customer = $_POST['customer'];
        $customer['modified'] = $now->format("Y-m-d H:i:s");

        update('customers', $id, $customer);
        header('location: index.php');
      } else {
        global $customer;
        $customer = find('customers', $id);
      } 

    } else {
      header('location: index.php');
    }
	}
?>