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
  <title>二年级语言第180页</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <?php
  $words = [
    '短文' => ['看见',  '哪里',  '那边',  '头顶',  '眼睛',  '雪白',  '肚皮',  '天空',  '傍晚',  '人们',  '冬天',  '花朵',  '平常',  '江河',  '海洋',  '田地',  '工作',  '办法',  '如果',  '已经',  '长大',  '四海为家',  '娃娃',  '只要',  '皮毛',  '那里',  '知识',],
    '识字' => ['花园',  '石桥',  '队旗',  '铜号',  '红领巾',  '欢笑',  '杨树',  '树叶',  '枫树',  '松柏',  '木棉',  '水杉',  '化石',  '金桂',  '写字',  '丛林',  '深处',  '竹林',  '熊猫',  '朋友',  '四季',  '农事',  '月光',  '辛苦',  '棉衣',],
    '课文' => ['一同',  '柱子',  '一边',  '到底',  '秤杆',  '力气',  '出来',  '船身',  '石头',  '地方',  '果然',  '评奖',  '时间',  '报纸',  '来不及',  '事情',  '坏事',  '好事',  '出国',  '今天',  '圆珠笔',  '开心',  '以前',  '还有',  '台灯',  '这时',  '阳光',  '电影',],
  ];
  $shuffle = true; // 打乱数组
  $onlyPinyin = true; // 不显示汉字只显示拼音

  foreach ($words as $className => $list) {
    echo '<dl>';
    // $className = Pinyin::sentence($className);
    echo "<dt>$className</dt>";
    echo '<dd><ul>';

    if ($shuffle) shuffle($list); // 打乱数组

    foreach ($list as $word) {
      $items = Pinyin::sentence($word)->toArray();
      echo '<li>';
      $chinese = preg_split('/(?<!^)(?!$)/u', $word);
      foreach ($items as $index => $pinyin) {
        $cn = '';
        $cn = $chinese[$index];
        if ($onlyPinyin) {
          $cn = '';
        }
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