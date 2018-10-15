<?php
namespace backend\controllers;

use common\rules\AuthorRule;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

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
                        'actions' => ['logout', 'index','role'],
                        'allow' => true,
                        'roles' => ['admin'],
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
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionRole(){

//        $admin = Yii::$app->authManager->createRole('admin');
//        $admin->description = 'Administrator';
//        Yii::$app->authManager->add($admin);
//
//        $moderator = Yii::$app->authManager->createRole('moderator');
//        $moderator->description = 'Moderator';
//        Yii::$app->authManager->add($moderator);
//
//        $perm1 = Yii::$app->authManager->createPermission('createPost');
//        $perm1->description = 'Access to create';
//        Yii::$app->authManager->add($perm1);
//
//        $perm2 = Yii::$app->authManager->createPermission('updatePost');
//        $perm2->description = 'Access to update';
//        Yii::$app->authManager->add($perm2);
//
//        $perm3 = Yii::$app->authManager->createPermission('deletePost');
//        $perm3->description = 'Access to delete';
//        Yii::$app->authManager->add($perm3);


////        $role_a = Yii::$app->authManager->getRole('admin');
//        $role_m = Yii::$app->authManager->getRole('moderator');
////
////        // admin
//        $permit = Yii::$app->authManager->getPermission('createPost');
////        Yii::$app->authManager->addChild($role_a, $permit);
////
////        $permit1 = Yii::$app->authManager->getPermission('deletePost');
////        Yii::$app->authManager->addChild($role_a, $permit1);
////
//        $permit2 = Yii::$app->authManager->getPermission('updatePost');
////        Yii::$app->authManager->addChild($role_a, $permit2);
//
//                Yii::$app->authManager->addChild($role_m, $permit);
//
//        Yii::$app->authManager->addChild($role_m, $permit2);

//        $auth = Yii::$app->authManager;
//        $rule = new AuthorRule();
//        $auth->add($rule);
//        $userRole = Yii::$app->authManager->getRole('admin');
//        Yii::$app->authManager->assign($userRole, 1);
//        $userRole1 = Yii::$app->authManager->getRole('moderator');
//        Yii::$app->authManager->assign($userRole1, 2);

        return "DONE!";
    }
}
