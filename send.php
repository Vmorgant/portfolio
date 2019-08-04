<?php
$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
$headers .= 'FROM:' . htmlspecialchars($_POST['email']);
$to = 'victor.morgant@gmail.com';
$subject = 'Message envoyé par ' . htmlspecialchars($_POST['nom']) . ' ' . htmlspecialchars($_POST['prenom']) . ' ' . htmlspecialchars($_POST['email']);
$message_content = '
  <table>
  <tr>
  <td><b>Emetteur du message:</b></td>
  </tr>
  <tr>
  <td>' . $subject . '</td>
  </tr>
  <tr>
  <td><b>Contenu du message:</b></td>
  </tr>
  <tr>
  <td>' . htmlspecialchars($_POST['message']) . '</td>
  </tr>
   <td><b>Contact:</b></td>
  </tr>
  <tr>
  <td>' . htmlspecialchars($_POST['email']) . '</td>
  
  ';
if (!empty($_POST['telephone'])) {
    $message_content = $message_content . '<td>' . htmlspecialchars($_POST['telephone']) . '</td>';
}
$message_content = $message_content . '</tr></table>';
mail($to, $subject, $message_content, $headers);
echo '<script>alert("Votre message a bien été envoyé");</script>';
header('Location: contact.php');

