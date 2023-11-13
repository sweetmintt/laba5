<?php
    include "db.php";
    $result = mysqli_query($mysql, "SELECT * FROM terms");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Страница с данными из БД</title>
  <style>
    table {
      border-collapse: collapse;
    }
    th, td {
      border: 1px solid black;
      padding: 5px;
    }
  </style>
</head>
<body>
  <h2>Таблица с данными о терминах и их определениях</h2>
  <table>
    <tr>
      <th>Термин</th>
      <th>Определение</th>
    </tr>
    <?php
      // Вывод данных из таблицы "terms" в виде таблицы
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['term'] . "</td>";
        echo "<td>" . $row['definition'] . "</td>";
        echo "</tr>";
      }
    ?>
  </table>
  <h2>Набор картинок с названиями</h2>
  <?php
    $result = mysqli_query($mysql, "SELECT * FROM images LIMIT 5");
    while ($image = mysqli_fetch_assoc($result)) {
      ?> 
    <div class="image-container">
        <img title="<?php echo $image['alt_text']; ?>" src="<?php echo $image['filename']; ?>" />
    </div>
    <?php
}
?>
<style>
    .image-container {
        display: inline-block;
        margin-right: 10px;
    }
    .image-container img {
        max-width: 33%;
        height: auto;
    }
</style>
</div>
  </div>
</body>
</html>