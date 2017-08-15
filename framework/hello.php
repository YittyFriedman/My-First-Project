<?php $name = $request->get('name','World') ?>
<?php /**
 * Created by PhpStorm.
 * User: yittyF
 * Date: 8/14/2017
 * Time: 5:41 PM
 */?>

Hello <?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8') ?>