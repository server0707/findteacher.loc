<?php
namespace frontend\controllers;

use common\controllers\AbdullaController;
use common\models\LoginForm;
use frontend\models\ContactForm;
use frontend\models\Course;
use frontend\models\Lesson;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\Subject;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\BadRequestHttpException;

/**
 * Site controller
 */
class SiteController extends AbdullaController
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
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
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $this->setMeta(Yii::t('yii', 'Home') . ' - ' . Yii::$app->name);

        return $this->render('index');
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        $this->setMeta(Yii::t('yii', 'Login') . ' - ' . Yii::$app->name);

        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $this->setMeta(Yii::t('yii', 'Contact') . ' - ' . Yii::$app->name);

        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', Yii::t('yii', 'Thank you for contacting us. We will respond to you as soon as possible.'));
            } else {
                Yii::$app->session->setFlash('error', Yii::t('yii', 'There was an error sending your message.'));
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        $this->setMeta(Yii::t('yii', 'About') . ' - ' . Yii::$app->name);

        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $this->setMeta(Yii::t('yii', 'SignUp') . ' - ' . Yii::$app->name);

        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', Yii::t('yii', 'Thank you for registration. Please check your inbox for verification email.'));
            return $this->goHome();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $this->setMeta(Yii::t('yii', 'Request password reset') . ' - ' . Yii::$app->name);

        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', Yii::t('yii', 'Check your email for further instructions.'));

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', Yii::t('yii', 'Sorry, we are unable to reset password for the provided email address.'));
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        $this->setMeta(Yii::t('yii', 'Reset password') . ' - ' . Yii::$app->name);

        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', Yii::t('yii', 'New password saved.'));

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Verify email address
     *
     * @param string $token
     * @return yii\web\Response
     * @throws BadRequestHttpException
     */
    public function actionVerifyEmail($token)
    {
        $this->setMeta(Yii::t('yii', 'Verify email') . ' - ' . Yii::$app->name);

        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if ($user = $model->verifyEmail()) {
            if (Yii::$app->user->login($user)) {
                Yii::$app->session->setFlash('success', Yii::t('yii', 'Your email has been confirmed!'));
                return $this->goHome();
            }
        }

        Yii::$app->session->setFlash('error', Yii::t('yii', 'Sorry, we are unable to verify your account with provided token.'));
        return $this->goHome();
    }

    /**
     * Resend verification email
     *
     * @return mixed
     */
    public function actionResendVerificationEmail()
    {
        $this->setMeta(Yii::t('yii', 'Resend verification email') . ' - ' . Yii::$app->name);

        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);
    }

    public function actionCourses(string $course_name = null)
    {
        $query = Course::find()->where(['status' => Course::STATUS_ACTIVE]);
        $courses_list = $query->all();
        if ($course_name !== null) {
            $query->andWhere(['name_' . Yii::$app->language => $course_name]);
            return $this->redirect(['site/subjects', 'course_id' => $query->one()['id']]);
        }

        $this->setMeta(Yii::t('yii', 'Courses') . ' - ' . Yii::$app->name);

        $courses = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 8,
            ],
        ]);

        return $this->render('courses', compact('courses', 'courses_list', 'course_name'));
    }

    public function actionSubjects(int $course_id = null, string $course_name = null)
    {
        $course = Course::findOne($course_id);
        if ($course_name !== null)
            $course = Course::findOne(['name_' . Yii::$app->language => $course_name]);

        $this->setMeta(Yii::t('yii', 'Subjects') . ' - ' . Yii::t('yii', $course['name_' . Yii::$app->language]) . Yii::$app->name);

        $course_id = $course->id;
        $subjects = new ActiveDataProvider([
            'query' => Subject::find()->where(['status' => Subject::STATUS_ACTIVE, 'course_id' => $course_id]),
            'pagination' => [
                'pageSize' => 8,
            ],
        ]);

        $courses = Course::find()->where(['status' => Course::STATUS_ACTIVE])->all();

        return $this->render('subjects', compact('subjects', 'course_id', 'courses'));
    }

    public function actionLessons(int $subject_id = null, string $subject_name = null)
    {
        $subject = Subject::findOne($subject_id);
        if ($subject_name !== null)
            $subject = Subject::findOne(['name_' . Yii::$app->language => $subject_name]);

        $this->setMeta(Yii::t('yii', 'Lessons') . ' / ' . Yii::t('yii', $subject['name_' . Yii::$app->language]) . ' - ' . Yii::$app->name);

        $subject_id = $subject->id;
        $lessons = new ActiveDataProvider([
            'query' => Lesson::find()->where(['status' => Subject::STATUS_ACTIVE, 'subject_id' => $subject_id]),
            'pagination' => [
                'pageSize' => 8,
            ],
        ]);

        $subjects = Subject::find()->where(['status' => Subject::STATUS_ACTIVE, 'course_id' => $subject->course_id])->all();

        return $this->render('lessons', compact('lessons', 'subject_id', 'subjects'));
    }
}
