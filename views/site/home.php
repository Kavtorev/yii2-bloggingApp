<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\db\ActiveRecord;
use yii\helpers\HtmlPurifier;
use yii\widgets\ListView;
use yii\data\Pagination;
use yii\widgets\LinkPager;
use yii\widgets\Pjax;
use yii\captcha\Captcha;

use yii\helpers\Url;

/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model app\models\Feedback */
/* @var $this yii\web\View */
/* @var $searchModel app\models\Search\FeedbackSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Home';
\app\assets\HomeAsset::register($this);
//$this->params['breadcrumbs'][] = $this->title;

?>


<!-- Placing the first photo on the web page: -->
<div class="parallax_first">
    <p class="pos_firsttextinPhoto">Here is a space where people share and  encourage others.</p>
</div>

<!-- User Choice, block system: -->
<div class="container">

    <div class="row col-2-lg" style="">
        
        <!-- Info element: -->
        <div class="col-lg-2 col-sm-12 col-md-12 col-lg-4 col-xl-4" style="margin-top: 50px">

            <!-- Learn part -->
            <div class="relaway">
                <h2 style="text-shadow: 2px 2px 2px rgba(0, 0, 0, 0.25);">Learn from others</h2>
                <div style="margin-top: 30px">
                    <medium>
                        In our innovation <per></per>iod, it's very
                        important to search for new knowledges
                        We propose to learn when reading from others,
                        you have the opportunity to search using sorting the programming
                        languages you prefer
                    </medium>
                </div>
            </div>
            <?= Html::a('Learn', ['post/posts'], ['class'=>'btn btn-primary button_params cube__button hov_ef', 'style' => 'border-radius: 24px; margin-top: 20px; margin-left: 0px; padding-bottom: 30px; background: #616DE1']) ?>

            <!-- divider -->
            <div class="divider"></div>

            <!-- Create part -->
            <div class="relaway" style="margin-top: 50px">
                <h2 style="text-shadow: 2px 2px 2px rgba(0, 0, 0, 0.25);">Create amazing things for others</h2>
                <div style="margin-top: 30px">
                    <medium>
                        If your passion is to create breathtaking things
                        in programming and you want to share it with others
                        on our platform, you can do that in two click's
                    </medium>
                </div>
            </div>
            <?= Html::a('Create', ['post/create'], ['class'=>'btn btn-primary button_params cube__button hov_ef', 'style' => 'border-radius: 24px; margin-top: 20px; margin-left: 0px; padding-bottom: 30px; background: #616DE1']) ?>

            <!-- divider -->
            <div class="divider"></div>

            <!-- News part -->
            <div class="relaway" style="margin-top: 50px">
                <h2 style="text-shadow: 2px 2px 2px rgba(0, 0, 0, 0.25);">Search for cool thing in the actual news</h2>
                <div style="margin-top: 30px">
                    <medium>
                        One more cool propose from our platform
                        is to read fresh news, source URL
                        we leave for you on the news page
                    </medium>
                </div>
            </div>
            <?= Html::a('Read', ['site/news'], ['class'=>'btn btn-primary button_params cube__button hov_ef', 'style' => 'border-radius: 24px; margin-top: 20px; margin-left: 0px; padding-bottom: 30px; background: #616DE1']) ?>


            <!-- divider -->
            <div class="divider"></div>

            <!-- Feedback part -->
            <div class="relaway" style="margin-top: 50px;">
                <h2 style="text-shadow: 2px 2px 2px rgba(0, 0, 0, 0.25);">We growth, and we are open for all of you</h2>
                <div style="margin-top: 30px">
                    <medium>
                        We would like to see some feedback from
                        you, if you find some part of our platform
                        that you want to change somehow, you are
                        welcome !!!
                    </medium>
                </div>
            </div>
            <!-- Paste here link for feedback form -->
            <?= Html::a('Feedback', ['#feedback'], ['class'=>'btn btn-primary button_params cube__button hov_ef', 'style' => 'border-radius: 24px; margin-top: 20px; margin-left: 0px; padding-bottom: 30px; background: #616DE1']) ?>


    </div>

        <!-- Cube element: -->
        <div class="col-5 col-sm-4 col-md-12 col-lg-4 col-xl-4">
            <div class="scene pos__cube">
                <div class="cube cube__spin">
                    <!-- JS -->
                    <div class="cube__face cube__face--front">
                        <img class="jslogo" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAAEsCAMAAAE5pE7RAAADAFBMVEX///+AvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQGAvQEc0sD/AAAA/3RSTlMAAQIDBAUGBwgJCgsMDQ4PEBESExQVFhcYGRobHB0eHyAhIiMkJSYnKCkqKywtLi8wMTIzNDU2Nzg5Ojs8PT4/QEFCQ0RFRkdISUpLTE1O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" alt="js">
                    </div>
                    <!-- Python -->
                    <div class="cube__face cube__face--back">
                        <div style="">
                            <img class="pythonlogo" src="https://assets.algoexpert.io/g67f39aee9a-prod/dist/images/pythonLogo.png?4f9d7b95" alt="py">
                        </div>
                    </div>
                    <!--Golang-->
                    <div class="cube__face cube__face--right">
                        <div style="">
                            <img class="gologo" src="https://assets.algoexpert.io/g67f39aee9a-prod/dist/images/goLogo.png?a54b64a0" alt="golang">
                        </div>
                    </div>
                    <!--C++-->
                    <div class="cube__face cube__face--left">
                        <div style="">
                            <img class="cpplogo" src="https://assets.algoexpert.io/g67f39aee9a-prod/dist/images/cppLogo.png?02100e93" alt="c++">
                        </div>
                    </div>
                    <div class="cube__face cube__face--top"></div>
                    <div class="cube__face cube__face--bottom" style="box-shadow: 0px 0px 0px rgba(0, 0, 0, 0.25);
filter: blur(34px);"></div>
                </div>
            </div>
            <!-- unused elements to change the current size manually, works on-->
            <p class="radio-group">
                <label>
<!--                    <input type="radio" name="rotate-cube-side" value="front" checked /> create-->
                </label>
                <label>
<!--                    <input type="radio" name="rotate-cube-side" value="right" /> read-->
                </label>
                <label>
<!--                    <input type="radio" name="rotate-cube-side" value="back" /> learn-->
                </label>
                <label>
<!--                    <input type="radio" name="rotate-cube-side" value="left" /> leave-->
                </label>
    <!--            <label>-->
    <!--                <input type="radio" name="rotate-cube-side" value="top" /> top-->
    <!--            </label>-->
    <!--            <label>-->
    <!--                <input type="radio" name="rotate-cube-side" value="bottom" /> bottom-->
    <!--            </label>-->
            </p>

        </div>
    </div>
</div>

<!-- Placing the second photo on the web page: -->
<div class="parallax_second">
    <p class="pos_secondtextinPhoto">Participate in platform’s growth</p>
</div>

<!-- comments block divider: -->
<div class="container">
    <div class="text-center">
        <p id = 'feedback' class="cos mb-5 mt-3">Leave comment</p>
    </div>
    <!-- leave comment: -->
    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>
        <div class="row">
            <div class="col mt-lg-5">
                <div class="relaway text-center">
                    <div class="">feedback posted</div>
                </div>
                <div class="alert alert-success relaway text-center ">
                    Thank you for feedback, you can see your comment below.
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="card mt-lg-5">
            <div class="card-body" style="background-color: #F0EFEF">
                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
                <!-- text form: -->
                <div class="form-group relaway">
                    <?= $form->field($model, 'message')->textArea(['class' => 'form-control','rows' => 6, 'maxlength' => 280]) ?>
                </div>

                <!-- Email form: -->
                <div class="form-group relaway">
                    <?= $form->field($model, 'email')->textarea(['class' => 'form-control', 'maxlength' => 65, 'style' => 'height: 40px']) ?>
                </div>

                <!-- ReCAPTCHA -->
                <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                ]) ?>

                <!-- Submit form button -->
                <div class="form-group text-center relaway-bold">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary btn-md', 'name' => 'contact-button']) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    <?php endif; ?>

    <!-- Comments: -->
    <?php
    if (is_array($result) || is_object($result))
    foreach ($result as $comment){
        echo "<br>
           
                <div class='card-body hov_ef' style='background-color: #F0EFEF; border-radius: 24px'>
                <div class='form-group relaway'>
                    <div class='' style='font-size: 30px; margin-top: -15px; color: #EDB23A'>
                        # ";
        echo Html::encode($comment->id_feedback), "</div>";
        echo "<div class='relaway' style='text-align: left; padding-left: 15px; padding-right: 15px'>";
        echo Html::encode($comment->message);
        echo "<br>
                <div class='' style='text-align: right; padding-top: 25px; margin-bottom: -25px; color: #A5A5A5'>";
        echo Html::encode($comment->created_at);
        echo "</div></div></div></div><br>";
    }
    ?>
</div>

<!-- JS Script for cube element: -->
<script>
    var cube = document.querySelector('.cube');
    var radioGroup = document.querySelector('.radio-group');
    var currentClass = '';

    function changeSide() {
        var checkedRadio = radioGroup.querySelector(':checked');
        var showClass = 'show-' + checkedRadio.value;
        if ( currentClass ) {
            cube.classList.remove( currentClass );
        }
        cube.classList.add( showClass );
        currentClass = showClass;
    }
    // set initial side
    changeSide();

    radioGroup.addEventListener( 'change', changeSide );
</script>

<!-- Options for buttons: -->
<?php
    $options = [
            //<a href="#" class="btn btn-primary button_params cube__button hov_ef" style="border-radius: 24px; margin-top: 20px; margin-left: 0px; padding-bottom: 30px; background: #616DE1">Learn</a>
            'a_posts' => [
                    'btn',
                    'theme' => 'btn-primary button_params cube__button hov_ef',
                    'style' => 'border-radius: 24px; margin-top: 20px; margin-left: 0px; padding-bottom: 30px; background: #616DE1',
                    'href' => '/post/posts',
            ],
            //<a href="#" class="btn btn-primary button_params cube__button hov_ef" style="border-radius: 24px; margin-top: 20px; margin-left: 0px; padding-bottom: 30px; ; background: #616DE1">Create</a>
            'a_create' => [
                    'btn',
                    'theme' => 'btn btn-primary button_params cube__button hov_ef',
                    'style' => 'border-radius: 24px; margin-top: 20px; margin-left: 0px; padding-bottom: 30px; ; background: #616DE1',
                    'href' => '/post/create'
            ],
            //<a href="../../views/site/news.php" class="btn btn-primary button_params cube__button hov_ef" style="border-radius: 24px; margin-top: 20px; margin-left: 0px; padding-bottom: 30px; background: #616DE1">Read</a>

    ]
?>