<?php

namespace app\controllers;

use Yii;
use app\models\Kabupaten;
use app\models\KabupatenSearch;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * KabupatenController implements the CRUD actions for Kabupaten model.
 */
class KabupatenController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Kabupaten models.
     * @return mixed
     */
    public function actionIndex()
    {
        // $searchModel = new KabupatenSearch();
        // $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        

        $search = Yii::$app->request->queryParams;
        $query = Kabupaten::find()
                ->joinWith('provinsi');
        
        $dataProvider = new ActiveDataProvider([
            'query'=> $query,
        ]);
        
        $session = Yii::$app->session;
        // check if a session is already open
        if (!$session->isActive){
            $session->open();// open a session
        } 
        // save query here
        $session['repquery'] = Yii::$app->request->queryParams;
        
        

        if(!empty($search['id_prov'])){
        $query->andFilterWhere(['like','provinsi.nama_prov',$search['id_prov']]);
        }
        
        if(!empty($search['nama_kab'])){
        $query->andFilterWhere(['like','nama_kab',$search['nama_kab']]);
        }
        if(!empty($search['jmlh_penduduk'])){
        $query->andFilterWhere(['like','jmlh_penduduk',$search['jmlh_penduduk']]);
        }


        


        return $this->render('index', [
            'search' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Kabupaten model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Kabupaten model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Kabupaten();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_kab]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Kabupaten model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_kab]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Kabupaten model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Kabupaten model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Kabupaten the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Kabupaten::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /*
	EXPORT WITH MPDF
	*/
    public function actionExportPdf()
    {
        $searchModel = new KabupatenSearch();
        $dataProvider = $searchModel->search(Yii::$app->session->get('repquery'));
        $html = $this->renderPartial('lapKab',['dataProvider'=>$dataProvider]);
        // $mpdf=new \mPDF('c','A4','','' , 0 , 0 , 0 , 0 , 0 , 0);  
        $mpdf=new \Mpdf\Mpdf();  
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->showImageErrors = true;
        $mpdf->list_indent_first_level = 0;  // 1 or 0 - whether to indent the first level of a list
        $mpdf->WriteHTML($html);
        $mpdf->Output();
        exit;
    }
}
