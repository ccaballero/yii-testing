<?php

class UsuarioController extends Controller
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout='//layouts/column2';

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
            // allow all users to perform 'index' and 'view' actions
            array('allow',
                'actions' => array(
                    'index',
                    'view',
                    'activos',
                    'inactivos',
                    'create',
                    'update',
                    'cambiarEstado',
                    'boleta',
                ),
                'users' => array('*'),
            ),
            // allow authenticated user to perform 'create' and 'update' actions
            /*array('allow',
                'actions' => array(),
                'users' => array('@'),
            ),
            // allow admin user to perform 'admin' and 'delete' actions
            array('allow',
                'actions' => array('delete'),
                'users' => array('admin'),
            ),*/
            // deny all users
            array('deny',
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array('model' => $this->loadModel($id)));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Usuario();

        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);

        if (isset($_POST['Usuario'])) {
            $model->attributes = $_POST['Usuario'];
            //$model->fecha_lim_act_usu = new CDbExpression('now()');
            $model->id_ciudad = $_POST['Usuario']['id_ciudad']; //ojoasoooooooo ak la base de datos
            $model->id_uni = $_POST['Usuario']['id_uni'];
            $model->activo_usu = 1;

            if ($model->save()) {
                $estudiantes = Estudiante::model()->findAllByAttributes(array(
                    'cod_juez' => $model->cod_juez));

                foreach ($estudiantes as $estudiante) {
                    $modelEstudianteUsuario = new UsuarioEstudiante();
                    $modelEstudianteUsuario->id_usu = $model->id_usu;
                    $modelEstudianteUsuario->id_est = $estudiante->id_est;
                    $modelEstudianteUsuario->save();
                }

                $this->redirect(array('view', 'id' => $model->id_usu));
            }
        }
        $this->render('create', array('model' => $model));
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

        if (isset($_POST['Usuario'])) {
            $model->attributes = $_POST['Usuario'];
            if ($model->save()) {
                $this->redirect(array('view', 'id' => $model->id_usu));
            }
        }

        $this->render('update', array('model' => $model));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax'])) {
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Usuario');
        /*if(isset($_GET['pdf'])) {
            $this->layout = 'layout';

            $mPDF1 = Yii::app()->ePdf->mpdf();
            $mPDF1->WriteHTML($this->render('index', array(
                'dataProvider' => $dataProvider,
            ), true));
            $mPDF1->Output();
        }*/

	$this->render('index', array('dataProvider' => $dataProvider));
    }

    public function actionBoleta($id) {
        $mPDF1 = Yii::app()->ePdf->mpdf();

        $model = $this->loadModel($id);
        if ($model->proyecto != null) {
            $this->layout = 'layout';
            $mPDF1->WriteHTML($this->render('boleta', array('model' => $model), true));
            $mPDF1->Output();
        } else {
            $this->render('error', array('model' => $model));
        }
    }

    public function actionAdmin() {
        $model = new Usuario('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Usuario'])) {
            $model->attributes = $_GET['Usuario'];
            $this->render('admin', array('model' => $model));
        }
    }

    /**
     * Load models actives.
     */
    public function actionActivos() {
        $model = new Usuario('search');
        $model->unsetAttributes();  // clear any default values
        $model->activo_usu = 1;

        // if(isset($_GET['Usuario']))
        // 	$model->attributes=$_GET['Usuario'];
        $this->render('activos', array('model' => $model));
    }

    /**
     * Load models actives.
     */
    public function actionInactivos() {
        $model = new Usuario('search');
        $model->unsetAttributes();  // clear any default values
        $model->activo_usu = 0;

        // if(isset($_GET['Usuario']))
        // 	$model->attributes=$_GET['Usuario'];
        $this->render('inactivos', array('model' => $model));
    }

    /**
     * Cambia el estado de un usuario particula a inactivo.
     * @param integer $id el ID del usuario a ser descativado
     */
    public function actionCambiarEstado($id) {
        $model = $this->loadModel($id);
        $model->activo_usu = $model->activo_usu?0:1;
        $model->cod_juez = $model->estudiantes[0]->cod_juez;
        $model->re_contrasena_usu = $model->contrasena_usu;
        $model->banderaActualizar = true;
        $model->save();
        $this->redirect(array('view', 'id' => $model->id_usu));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Usuario the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Usuario::model()->findByPk($id);
        if ($model === null) {
            throw new CHttpException(404,'The requested page does not exist.');
        }
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Usuario $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax']==='usuario-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
