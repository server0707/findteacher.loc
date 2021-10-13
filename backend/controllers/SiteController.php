<?php

namespace backend\controllers;

use backend\models\Answer;
use common\models\LoginForm;
use Faker\Factory;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index', 'add-data'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $this->layout = 'main-login';

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($model->loginToAdmin()) {
                return $this->goBack();
            } else {
                $model->addError('password', Yii::t('app', 'Incorrect username or password.'));
                $model->password = '';

                return $this->render('login', [
                    'model' => $model,
                ]);
            }
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionAddData()
    {

        $faker = Factory::create();


        //100 ta kurs qo'shish
        /*for ($i = 0; $i < 100; $i++){
            $course = new Course();
            $course->name_uz = $faker->name;
            $course->name_ru = $faker->name;
            $course->description_uz = $faker->text;
            $course->description_ru = $faker->text;
            $course->status = rand(0,2);
            $course->save();
        }*/

        //200 ta fan qo'shish
        /*for ($i = 0; $i < 200; $i++) {
            $object = new Subject();
            $object->course_id = rand(1, 100);
            $object->about_uz = $faker->realText(200);
            $object->about_ru = $faker->realText(200);
            $object->name_uz = $faker->name;
            $object->name_ru = $faker->name;
            $object->description_uz = $faker->text;
            $object->description_ru = $faker->text;
            $object->status = rand(0, 2);
            $object->save();
        }*/

        //3000 ta mavzu qo'shish
        /*for ($i = 0; $i < 3000; $i++) {
            $object = new Theme();
            $object->subject_id = rand(1, 200);
            $object->name_uz = $faker->name;
            $object->name_ru = $faker->name;
            $object->save();
        }*/

        //50 ta user qo'shish
        /*for ($i = 0; $i < 50; $i++) {
            $object = new User();
            $object->username = $faker->userName;
            $object->auth_key = $faker->text(30);
            $object->email = $faker->email;
            //parol: faker1234
            $object->password_hash = '$2y$13$2tGBcat34Hu5SyK6UapVzu1molCe9sKGDKW9T8H4b64xtKFrSsmvy';
            $object->sex = rand(0,1);
            $object->status = [0,9,10][array_rand([0,9,10],1)];
            $object->role = ['admin','student','teacher'][array_rand(['admin','student','teacher'],1)];
            $object->firstName = $faker->firstName;
            $object->lastName = $faker->lastName;
            $object->fatherName = (rand(0,10) != 0) ? $faker->lastName : '';
            $object->phone = $faker->phoneNumber;
            $object->save();
        }*/

        //75 ta lesson qo'shish
        /*for ($i = 0; $i < 75; $i++) {
            $object = new Lesson();
            $object->user_id = rand(1, 57);
            $object->subject_id = rand(1, 200);
            $object->viewed = rand(1, 200);
            $object->student_count = rand(5, 30);
            $object->status = rand(0, 2);
            $object->about_uz = $faker->realText(200);
            $object->about_ru = $faker->realText(200);
            $object->description_uz = $faker->text;
            $object->description_ru = $faker->text;
            $object->price = rand(50000, 1500000) . "";
            $object->old_price = rand(50000, 1500000) . "";
            $object->link_of_lesson_video = $faker->url;

            if (!$object->save()) {
                echo "ID: " . $i . "<br>";
                echo "<pre>";
                var_dump($object->errors);
                echo "<pre>";
                die();
            }
        }*/

        //15000 ta question qo'shish
        /*for ($i = 1; $i < 15000; $i++) {
            $object = new Question();
            $object->user_id = rand(1, 57);
            $object->subject_id = rand(1, 200);
            $object->theme_id = rand(1, 3000);
            $object->status = rand(0, 2);
            $object->text_uz = $faker->realText(200);
            $object->text_ru = $faker->realText(200);

            if (!$object->save()) {
                echo "ID: " . $i . "<br>";
                echo "<pre>";
                var_dump($object->errors);
                echo "<pre>";
                die();
            }
        }*/

        //15000*4 ta answer qo'shish
        /*for ($i = 1; $i < 15000; $i++) {
            $object = new Answer();
            $object->question_id = $i;
            $object->text_uz = $faker->realText(200);
            $object->text_ru = $faker->realText(200);
            $object->correct = 1;

            if (!$object->save()) {
                echo "ID: " . $i . "<br>";
                echo "<pre>";
                var_dump($object->errors);
                echo "<pre>";
                die();
            }
            unset($object);

            for ($j = 0; $j < 3; $j++) {
                $object = new Answer();
                $object->question_id = $i;
                $object->text_uz = $faker->realText(200);
                $object->text_ru = $faker->realText(200);
                $object->correct = 0;

                if (!$object->save()) {
                    echo "ID: " . $i . ' - ' . $j . "<br>";
                    echo "<pre>";
                    var_dump($object->errors);
                    echo "<pre>";
                    die();
                }
            }
        }*/

        return $this->redirect(['site/index']);
    }
}
