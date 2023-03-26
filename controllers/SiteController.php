<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\GrantApplicationForm;
use app\models\GrantApplication;
use app\models\CallForApplication;
use app\models\Program;
use app\models\Commune;
use yii\data\Pagination;


class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
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
     * @return string
     */
    public function actionIndex()
    {
        $programs = CallForApplication::getCallForApplication();

        return $this->render('index', [
            'programs' => $programs,
        ]);
    }

    public function actionRegister($call_for_application_id)
    {
        $active = CallForApplication::isActive($call_for_application_id);

        if ($active == false) {
            throw new \yii\web\NotFoundHttpException;
        }

        $callApplication = CallForApplication::findOne($call_for_application_id);

        $communes = Commune::getDropdownListCallForApplication($call_for_application_id);

        $model = new GrantApplicationForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $grantApplication = new GrantApplication();
            $grantApplication->email = $model->email;
            $grantApplication->call_for_application_id = $callApplication->id;
            $grantApplication->program_id = $callApplication->program_id;
            $grantApplication->commune_id = $model->commune_id;
            $grantApplication->save();

            return $this->render('register_success', [
                'program' => Program::findOne($callApplication->program_id),
                'grantApplication' => $model,
            ]);
        }

        return $this->render('register', [
            'program' => Program::findOne($callApplication->program_id),
            'model' => $model,
            'communes' => $communes,
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays grantApplication page.
     *
     * @return string
     */
    public function actionApplications()
    {
        $rows = (new \yii\db\Query())
            ->select(['grant_application.id', 'grant_application.email', 'grant_application.program_id', 'program.name AS program', 'commune.name AS commune'])
            ->from('grant_application')
            ->join('LEFT JOIN', 'program', 'program.id = grant_application.program_id')
            ->join('LEFT JOIN', 'commune', 'commune.id = grant_application.commune_id')
            ->all();

        return $this->render('grant_applications', [
            'applications' => $rows
        ]);
    }
}
