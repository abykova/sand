<?php

namespace app\controllers;

use app\models\Infographic;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

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
	 * @return string
	 */
	public function actionIndex()
	{
		$model = new Infographic();

		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			return $this->redirect(['tableView', 'dataProvider' => $this->dataProvider()]);
		}

		return $this->render('index', [
			'model' => $model,
		]);
	}

	public function actionTable()
	{
		return $this->render('tableView', [
			'dataProvider' => $this->dataProvider(),
		]);
	}

	public function actionGraphic()
	{
		$id = 6;

//		$date   = $this->findModel($id)->date;
//		$summa  = $this->findModel($id)->sum;
//		$mounth = $this->findModel($id)->timing;
//		$apr    = $this->findModel($id)->apr;

		$date   = '16.11.2020';
		$summa  = '500000';
		$mounth = '6';
		$apr    = '9.3';

		$amountInMonth        = $summa/$mounth;
		$amountOfInterestPaid = $this->amountOfInterestPaid($apr, $summa, $amountInMonth);
		$allSum               = ($summa+$amountOfInterestPaid);
		$principalBalance     = $this->principalBalance($allSum, $amountInMonth, $mounth);


		//Платёж в месяц
		$money = $allSum/$mounth;

		//Сумма погашаемых процентов
		$interestPaid = $amountOfInterestPaid/$mounth;

		//Сумма погашаемого основного долга

		//Остаток основного долга

		return $this->render('graphic', [
			'date'                 => $date,
			'mounth'               => $mounth,
			'allSum'               => $allSum,
			'amountInMonth'        => $money,
			'principalBalance'     => $principalBalance,
			'amountOfInterestPaid' => $interestPaid,
		]);
	}

	//всего погашенных процентов
	public function amountOfInterestPaid($apr, $summa, $amountInMonth)
	{
		$sumDayInMonth    = 30;
		$sumDayInYear     = 365;
		$principalBalance = $this->principalBalance($summa, $amountInMonth);

		$amount = (($apr*$sumDayInMonth)/(100*$sumDayInYear))*$principalBalance;

		return $amount;
	}

	//остаток основного долга
	public function principalBalance($allSum, $amountInMonth, $mounth = null)
	{
		//вся сумма должна уменьшаться каждый месяц

		if(!empty($mounth))
		{
			$principalBalance = 1;
		}



		$principalBalance = $allSum - $amountInMonth;

		return $principalBalance;
	}

	protected function findModel($id)
	{
		if (($model = Infographic::findOne($id)) !== null) {
			return $model;
		}

		throw new NotFoundHttpException('The requested page does not exist.');
	}

	public function dataProvider()
	{
		$dataProvider = new ActiveDataProvider([
			'query' => Infographic::find(),
		]);

		return $dataProvider;
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
	 * Displays contact page.
	 *
	 * @return Response|string
	 */
	public function actionContact()
	{
		$model = new ContactForm();
		if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
			Yii::$app->session->setFlash('contactFormSubmitted');

			return $this->refresh();
		}
		return $this->render('contact', [
			'model' => $model,
		]);
	}

	/**
	 * Displays about page.
	 *
	 * @return string
	 */
	public function actionAbout()
	{
		return $this->render('about');
	}
}
