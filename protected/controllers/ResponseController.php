<?php

class ResponseController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view', 'summary'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionSummary(){
        
        // get all active districs
        $criteria = new CDbCriteria;
        $criteria->addCondition("status = 1");
        $districts = district::model()->findAll($criteria);

        // get all active politcal party
        $criteria = new CDbCriteria;
        $criteria->addCondition("status = 1");
        $political_parties = political_party::model()->findAll($criteria);
        
        // get all responses
        //$criteria = new CDbCriteria;
        //$criteria->addCondition("status = 1");
        //
        //$criteria->group = 'Intention';
        
        $params = array();
        $post_response = array(
           'district_id' => 0,
           'political_party_id' => 0
        );
        if (isset($_POST['response'])) {
            $post_response = $_POST['response'];
            foreach ($post_response as $key => $value) {
                if ($value !== '0'){
                    $params[] = $key.' = '.$value;
                }
            }

        }
        
        $responsesIntention = response::model()->responseIntention(array('Intention'),array('Intention'),$params);
        
        $responsesIntentionByDistrict = response::model()->responseIntention(array('Intention','district_id'),array('Intention','district_id'),$params);
        
        $params[] = 'Intention = 1';
        $responsesIntentionByPolitical_Party = response::model()->responseIntention(array('political_party_id'),array('political_party_id'),$params);
      
        
        
        $this->render('summary', array(
            'filters_value' => $post_response,
            'responsesIntention' => $responsesIntention,
            'responsesIntentionByDistrict' => $responsesIntentionByDistrict,
            'responsesIntentionByPolitical_Party' => $responsesIntentionByPolitical_Party,
            'districts' => $districts,
            'political_parties' => $political_parties,
        ));
        
    }
    
    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new response;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        // get all active districs
        $criteria = new CDbCriteria;
        $criteria->addCondition("status = 1");
        $districts = district::model()->findAll($criteria);

        // get all active politcal party
        $criteria = new CDbCriteria;
        $criteria->addCondition("status = 1");
        $political_party = political_party::model()->findAll($criteria);

        if (isset($_POST['response'])) {
            $model->attributes = $_POST['response'];
           // var_dump($m);
            //if ($model->Intention == 0) {
             //   $model->political_party_id = NULL;
          //  }
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('create', array(
            'model' => $model,
            'districts' => $districts,
            'political_party' => $political_party,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['response'])) {
            $model->attributes = $_POST['response'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('response');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new response('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['response']))
            $model->attributes = $_GET['response'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = response::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'response-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
