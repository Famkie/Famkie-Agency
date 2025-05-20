<?php
$menu_items = [
  'home'      => 'Home',
  'target'      => 'Active Target', 
  'history'      => 'History',
  'guide'      => 'Guide',
  'attackers'      => 'Agency Attackers',
  'order'     => 'Request Order', 
  'bank'      => 'Agency Bank',
  'ranking'      => 'Ranking',
  'raffles'      => 'Raffles',
  'casino'      => 'Casino',
  'settings'      => 'Setting',
  'staff'      => 'Staff',
];

foreach ($menu_items as $page => $label) {
    echo "<a href=\"index.php?page=$page\">$label</a>";
}