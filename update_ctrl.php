<?php

$ctrlFile = 'e:\iqragrup\app\Http\Controllers\Welcome\WelcomeController.php';
$ctrl = file_get_contents($ctrlFile);

$replacement = <<<'EOF'
public function index(Request $r){
        
      $homePage = \App\Models\Post::where('type', 0)->where('template', 'Front Page')->first();

      $latestServices =Post::where('type',3)
EOF;

$ctrl = preg_replace('/public function index\(Request \$r\)\{\s*(\/\/.*?\s*)*\$latestServices =Post::where\(\'type\',3\)/is', $replacement, $ctrl);

$ctrl = preg_replace('/return view\(welcomeTheme\(\)\.\'index\',compact\(\'latestServices\',\'latestPosts\'\)\);/is', 'return view(welcomeTheme().\'index\',compact(\'homePage\',\'latestServices\',\'latestPosts\'));', $ctrl);

file_put_contents($ctrlFile, $ctrl);
echo "WelcomeController updated.\n";
