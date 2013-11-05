<?php

class ProyectoController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
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
	public function accessRules()
	{
		return array(
				array('allow',  // allow all users to perform 'index' and 'view' actions
						'actions'=>array('index','view','create','update','admin','area','areas'),
						'users'=>array('*'),
				),
				array('allow', // allow authenticated user to perform 'create' and 'update' actions
						'actions'=>array('fechalimite', 'habilitar','deshabilitar'),
						'users'=>array('@'),
				),
				array('allow', // allow admin user to perform 'admin' and 'delete' actions
						'actions'=>array('delete'),
						'users'=>array('admin'),
				),
				array('deny',  // deny all users
						'users'=>array('*'),
				),
		);
	}

        
          public function actionFechalimite($id) {
            $model=$this->loadModel($id);

            $modelUsu = $model->idUsu;
            $modelUsu->fecha_lim_act_usu = $_POST['Usuario']['fecha_lim_act_usu'];
            $modelUsu->save(false);
            
            $modelArc = $model->archivos;
            
      if (date("Y-m-d") < $modelUsu->fecha_lim_act_usu){
            foreach ($modelArc as $archivo) {
                $archivo->habilitar = true;
                $archivo->save(false);
            }
      } else {
            foreach ($modelArc as $archivo) {
                $archivo->habilitar = false;
                $archivo->save(false);
            }
  }
            $this->redirect(array('view', 'id' => $model->id_usu));
        }
        
         public function actionHabilitar($id) {
            $model=$this->loadModel($id);

            $modelArc = $model->archivos;
            
            foreach ($modelArc as $archivo) {
                if ($archivo->id_arc == $_GET['id'] && (date("Y-m-d") < $model->idUsu->fecha_lim_act_usu) ) {
                    $archivo->habilitar = true;
                    $archivo->save(false);
                }
            }
            
            $this->redirect(array('view', 'id' => $model->id_usu));
        }
        
        public function actionDeshabilitar($id) {
            $model=$this->loadModel($id);

            $modelArc = $model->archivos;
            
            foreach ($modelArc as $archivo) {
                if ($archivo->id_arc == $_GET['id']&& (date("Y-m-d") < $model->idUsu->fecha_lim_act_usu)) {
                    $archivo->habilitar = false;
                    $archivo->save(false);
                }
            }
            
            $this->redirect(array('view', 'id' => $model->id_usu));
        }
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array('model'=>$this->loadModel($id),));
	}
	
	/**
	 * Muestra los proyectos relacionados a una area.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionArea($id)
	{
		$model=new Proyecto('search');
		$model->unsetAttributes();  // clear any default values
		$model->id_are = $id;
		$this->render('area',array('model'=>$model,));
	}
	
	public function actionAreas()
	{
		$dataProvider=new CActiveDataProvider('Area');
		$this->render('areas',array(
				'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */

	//
	public function actionCreate()
	{
		$model=new Proyecto;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['Usuario']))
		{
			$model->attributes=$_POST['Usuario'];
			//$model->fecha_lim_act_usu = new CDbExpression('now()');
			$model->activo_usu = 1;
			if($model->save())
			{
				$modelEstudianteUsuario = new UsuarioEstudiante();
				$modelEstudianteUsuario->id_usu = $model->id_usu;

				$modelEstudianteUsuario->id_est = Estudiante::model()->findByAttributes(array('cod_sis_est'=>$model->cod_sis))->id_est;

				$modelEstudianteUsuario->save();
				$this->redirect(array('view','id'=>$model->id_usu));
			}

		}

		$this->render('create',array(
				'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Proyecto']))
		{
			$model->attributes=$_POST['Proyecto'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_usu));
		}

		$this->render('update',array(
				'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Proyecto');
		$this->render('index',array(
				'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Usuario('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Usuario']))
			$model->attributes=$_GET['Usuario'];

		$this->render('admin',array(
				'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Usuario the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Proyecto::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Usuario $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='proyecto-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
