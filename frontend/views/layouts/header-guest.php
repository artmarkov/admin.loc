<?php
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this \yii\web\View */
/* @var $content string */
$this->registerCssFile('\css\site-guest.css  ');
?>

<header class="main-header">
    <?= Html::a('<span class="logo-mini">АИС</span><span class="logo-lg">' . Yii::$app->name . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                <i class="fa fa-bars"></i>
            </button>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="<?= Url::to(['/post/index']) ?>">Post</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                        <li class="divider"></li>
                        <li><a href="<?= Url::to(['/site/contact']) ?>">Обратная связь</a></li>
                    </ul>
                </li>
            </ul>
             <form class="navbar-form navbar-left" role="search">
                 <div class="form-group">
                     <input type="text" class="form-control" id="navbar-search-input" placeholder="Search">
                 </div>
             </form>
        </div>
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="active"><a title="Главная" href="<?= Url::to(['/site/index']) ?>"><i class="fa fa-home"></i></a>
                </li>
                <li><a title="Регистрация" href="<?= Url::to(['/site/signup-find']) ?>"><i class="fa fa-user-plus"></i></a>
                </li>
                <li><a title="Вход в ЛК" href="<?= Url::to(['/site/login']) ?>"><i class="fa fa-sign-in"></i></a></li>
            </ul>

        </div>
        <!-- /.navbar-custom-menu -->
    </nav>
</header>
