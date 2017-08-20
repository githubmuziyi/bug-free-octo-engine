<?php
/**
 * Created by PhpStorm.
 * User: muzi
 * Date: 2017/5/5
 * Time: 下午11:04
 */

//echo exec('whoami');
$command = 'cd .. && ls -l 2>&1';
exec($command, $output, $code);
echo json_encode($output);