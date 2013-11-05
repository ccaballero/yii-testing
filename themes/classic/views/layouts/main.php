<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC
    "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="es" />

        <!-- blueprint CSS framework -->
        <link rel="stylesheet" type="text/css"
              href="<?php echo Yii::app()->theme->baseUrl; ?>/css/screen.css"
              media="screen, projection" />
        <link rel="stylesheet" type="text/css"
              href="<?php echo Yii::app()->theme->baseUrl; ?>/css/print.css"
              media="print" />
        <!--[if lt IE 8]>
        <link rel="stylesheet" type="text/css"
              href="<?php echo Yii::app()->theme->baseUrl; ?>/css/ie.css"
              media="screen, projection" />
        <![endif]-->

        <link rel="stylesheet" type="text/css"
              href="<?php echo Yii::app()->theme->baseUrl; ?>/css/main.css" />
        <link rel="stylesheet" type="text/css"
              href="<?php echo Yii::app()->theme->baseUrl; ?>/css/form.css" />

        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>
    <body>
        <div class="container" id="page">
            <!-- header -->
            <div id="header">
                <div id="logo">
                    <?php echo CHtml::encode(Yii::app()->name); ?>
                </div>
            </div>
            <!-- mainmenu -->
            <div id="mainmenu">
            <?php $this->widget('zii.widgets.CMenu', array(
                'items' => array(
                    array(
                        'label' => 'Inicio',
                        'url' => array('/site/index')),
                    array(
                        'label' => 'Registrar Usuario Juez',
                        'url' => array('/usuario/create')),
                    array(
                        'label' => 'Crear Juez',
                        'url' => array('/estudiante/create')),
                    array(
                        'label' => 'Crear Comite',
                        'url' => array('/comite/create')),
                    array(
                        'label' => 'Registro de Olimpistas',
                        'url' => array('/postulante/create')),
                    array(
                        'label' => 'Problemas',
                        'url' => array('/problema/index')),
                ),
            )); ?>
            </div>
        <?php if (isset($this->breadcrumbs)): ?>
            <!-- breadcrumbs -->
            <?php $this->widget('zii.widgets.CBreadcrumbs', array(
                'links'=>$this->breadcrumbs,
            )); ?>
	<?php endif; ?>
            <?php echo $content; ?>
            <div class="clear"></div>
            <!-- footer -->
            <div id="footer">
                Copyright &copy; <?php echo date('Y'); ?> bolivian software SRL.<br/>
                Desarrollado con <a href="http://www.yiiframework.com">Yii Framework</a>.<br/>
                <img src="images/logo.png" width="50px" height="50px" />
            </div>
        </div>
    </body>
</html>
