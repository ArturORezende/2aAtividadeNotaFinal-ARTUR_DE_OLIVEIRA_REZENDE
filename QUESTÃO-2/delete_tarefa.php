<?php
   include 'database.php';

   if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $id = $_POST['id'];

      $db = getDatabaseConnection();
      $stmt = $db->prepare("DELETE FROM tarefas WHERE id = :id");
      $stmt->bindParam(':id', $id);
      $stmt->execute();
   }

      header('Location: index.php');
   exit();
?>