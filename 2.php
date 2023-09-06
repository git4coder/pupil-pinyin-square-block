<?php
require 'vendor/autoload.php';

// https://github.com/overtrue/pinyin
use Overtrue\Pinyin\Pinyin;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>生词本</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <?php
  $words = [
    '木字旁， 木' => ['松', '杨', '柳', '根', '枝', '树', '枫'],
    '三点水， 氵' => ['江', '河', '湖', '海', '洗', '浪', '泡'],
    '四点底， 灬' => ['蒸', '煮', '熬', '煎', '熟', '焦', '熏'],
    '火宇旁， 火' => ['烧', '烤', '烟', '炮', '炖', '炸', '炒'],
    '食字旁， 饣' => ['饭', '馒', '馅', '饺', '馄', '饨', '饼'],
    '女字旁， 女' => ['姥', '奶', '姑', '妈', '姨', '姐', '妹'],
    '衣字旁， 衤' => ['裙', '袖', '裤', '讨', '衫', '袜', '被'],
    '月字旁， 月' => ['脑', '脸', '胳', '膊', '腕', '腿', '肚'],
    '鸟宇旁， 鸟' => ['鹊', '鸽', '鸡', '鹅', '鸭', '鹦', '鹉'],
    '虫字旁， 虫' => ['蜻', '蜓', '蚂', '蚁', '蛛', '蝴', '蝶'],
    '反犬旁， 犭' => ['猴', '狗', '猪', '猩', '狼', '狐', '狮'],
    '草字头， 艹' => ['萍', '荷', '花', '葡', '萄', '蘑', '菇'],
    '提手旁， 扌' => ['擦', '搬', '提', '扔', '拾', '捡', '拖'],
    '足字旁， 足' => ['踏', '蹈', '蹦', '跳', '跨', '踢', '跑'],
    '口字旁， 口' => ['吹', '呼', '喊', '吃', '喝', '吵', '咬'],
    '王字旁， 王' => ['玻', '璃', '珊', '瑚', '珍', '珠', '球'],
    '雨宇头， 雨' => ['雪', '雾', '霜', '雷', '露', '雹', '霾'],
    '竖心旁， 忄' => ['恨', '怪', '怕', '惊', '慌', '忙', '爅'],
  ];

  foreach ($words as $className => $list) {
    echo '<dl>';
    // $className = Pinyin::sentence($className);
    echo "<dt>$className</dt>";
    echo '<dd><ul>';
    foreach ($list as $word) {
      $items = Pinyin::sentence($word)->toArray();
      echo '<li>';
      $chinese = preg_split('/(?<!^)(?!$)/u', $word);
      foreach ($items as $index => $pinyin) {
        $cn = '';
        $cn = $chinese[$index];
        echo "<div class=\"word\"><span class=\"pinyin\">$pinyin</span><span class=\"unit\">$cn</span></div>";
      }
      echo '</li>';
    }
    echo '</ul></dd>';
    echo '</dl>';
  }
  ?>
</body>

</html>