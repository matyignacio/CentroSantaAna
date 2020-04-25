<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use app\models\User;
use app\models\Paciente;
use yii\helpers\Html;
use app\models\PacienteSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Mpdf\Mpdf;

/**
 * PacienteController implements the CRUD actions for Paciente model.
 */
class PacienteController extends Controller {

    /**
     * {@inheritdoc}
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['create', 'index', 'update', 'view', 'delete'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['login', 'register'],
                        'roles' => ['?'],
                    ],
                    [
                        //El administrador tiene permisos sobre las siguientes acciones
                        'actions' => ['create', 'index', 'update', 'view', 'delete'],
                        //Esta propiedad establece que tiene permisos
                        'allow' => true,
                        //Usuarios autenticados, el signo ? es para invitados
                        'roles' => ['@'],
                        //Este método nos permite crear un filtro sobre la identidad del usuario
                        //y así establecer si tiene permisos o no
                        'matchCallback' => function ($rule, $action) {
                            //Llamada al método que comprueba si es un administrador
                            return User::isUserAdmin(Yii::$app->user->identity->id);
                        },
                    ],
                    [
                        //Los usuarios simples tienen permisos sobre las siguientes acciones
                        'actions' => ['create', 'index', 'update', 'view', 'delete'],
                        //Esta propiedad establece que tiene permisos
                        'allow' => true,
                        //Usuarios autenticados, el signo ? es para invitados
                        'roles' => ['@'],
                        //Este método nos permite crear un filtro sobre la identidad del usuario
                        //y así establecer si tiene permisos o no
                        'matchCallback' => function ($rule, $action) {
                            //Llamada al método que comprueba si es un usuario simple
                            return User::isUserSimple(Yii::$app->user->identity->id);
                        },
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Paciente models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new PacienteSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Paciente model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Paciente model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Paciente();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing Paciente model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    public function actionInsertar() {
        // CAPTURAMOS LOS PARAMETROS
        $paciente = new Paciente();
        $request = Yii::$app->request;
        $antecedentespaciente = $request->post('Pacienteantecedentes');
        // CARGAMOS EL MODELO CON LOS DATOS DEL FORMULARIO
        $paciente->nombre = $request->post('Paciente')['nombre'];
        $paciente->fecha_nacimiento = $request->post('Paciente')['fecha_nacimiento'];
        $paciente->dni = $request->post('Paciente')['dni'];
        $paciente->id_obra_social = $request->post('Paciente')['id_obra_social'];
        $paciente->domicilio = $request->post('Paciente')['domicilio'];
        $paciente->estado_civil = $request->post('Paciente')['estado_civil'];
        $paciente->telefono = $request->post('Paciente')['telefono'];
        $paciente->fecha_ingreso = $request->post('Paciente')['fecha_ingreso'];
        $paciente->datos_padre = $request->post('Paciente')['datos_padre'];
        $paciente->datos_madre = $request->post('Paciente')['datos_madre'];
        $paciente->familiar_responsable = $request->post('Paciente')['familiar_responsable'];
        $paciente->id_usuario = $request->post('Paciente')['id_usuario'];
        $paciente->hospital = $request->post('Paciente')['hospital'];
        $paciente->derivador_por = $request->post('Paciente')['derivador_por'];
        $paciente->certificado_discapacidad = $request->post('Paciente')['certificado_discapacidad'];
        $paciente->vigencia_certificado = $request->post('Paciente')['vigencia_certificado'];
        $paciente->escolaridad = $request->post('Paciente')['escolaridad'];
        $paciente->nombre_escuela = $request->post('Paciente')['nombre_escuela'];
        // INICIAMOS LA TRANSACCION
        $transaction = Yii::$app->db->beginTransaction();
        // INTENTAMOS GUARDAR EL MODELO
        if (!$paciente->save()) {
            $transaction->rollBack();
            return $this->render('create', [
                        'model' => $paciente,
            ]);
        }
        // INTENTAMOS GUARDAR LOS SERVICIOS
        if (!$this->saveModelAuxiliar($antecedentespaciente, $paciente->id)) {
            $transaction->rollBack();
            return $this->render('create', [
                        'model' => $paciente,
            ]);
        }
        // COMMITEAMOS LA TRANSACCION
        $transaction->commit();
        // POR ULTIMO REDIRECCIONAMOS AL VIEW
        return $this->redirect(['view', 'id' => $paciente->id]);
    }

    public function actionActualizar() {
        $request = Yii::$app->request;
        // CAPTURAMOS LOS PARAMETROS
        $paciente = Paciente::findOne($request->post('id'));
        $antecedentespaciente = $request->post('Pacienteantecedentes');
        // INICIAMOS LA TRANSACCION
        $transaction = Yii::$app->db->beginTransaction();
        // PRIMERO ELIMINAMOS LOS REGISTROS EN LA TABLA AUXILIAR SERVICIO_ANALITO
        \app\models\AntecedentePaciente::deleteAll('id_paciente = :id_paciente ', [':id_paciente' => $request->post('id')]);
        // CARGAMOS EL MODELO CON LOS DATOS DEL FORMULARIO
        $paciente->nombre = $request->post('Paciente')['nombre'];
        $paciente->fecha_nacimiento = $request->post('Paciente')['fecha_nacimiento'];
        $paciente->dni = $request->post('Paciente')['dni'];
        $paciente->id_obra_social = $request->post('Paciente')['id_obra_social'];
        $paciente->domicilio = $request->post('Paciente')['domicilio'];
        $paciente->estado_civil = $request->post('Paciente')['estado_civil'];
        $paciente->telefono = $request->post('Paciente')['telefono'];
        $paciente->fecha_ingreso = $request->post('Paciente')['fecha_ingreso'];
        $paciente->datos_padre = $request->post('Paciente')['datos_padre'];
        $paciente->datos_madre = $request->post('Paciente')['datos_madre'];
        $paciente->familiar_responsable = $request->post('Paciente')['familiar_responsable'];
        $paciente->id_usuario = $request->post('Paciente')['id_usuario'];
        $paciente->hospital = $request->post('Paciente')['hospital'];
        $paciente->derivador_por = $request->post('Paciente')['derivador_por'];
        $paciente->certificado_discapacidad = $request->post('Paciente')['certificado_discapacidad'];
        $paciente->vigencia_certificado = $request->post('Paciente')['vigencia_certificado'];
        $paciente->escolaridad = $request->post('Paciente')['escolaridad'];
        $paciente->nombre_escuela = $request->post('Paciente')['nombre_escuela'];
        // INTENTAMOS GUARDAR EL MODELO
        if (!$paciente->save()) {
            $transaction->rollBack();
            return $this->render('update', [
                        'model' => $paciente,
            ]);
        }
        // INTENTAMOS GUARDAR LOS SERVICIOS
        if (!$this->saveModelAuxiliar($antecedentespaciente, $request->post('id'))) {
            $transaction->rollBack();
            return $this->render('update', [
                        'model' => $paciente,
            ]);
        }
        // COMMITEAMOS LA TRANSACCION
        $transaction->commit();
        // POR ULTIMO REDIRECCIONAMOS AL VIEW
        return $this->redirect(['view', 'id' => $paciente->id]);
    }

    public function saveModelAuxiliar($antecedentespaciente, $id_paciente) {
        unset($antecedentespaciente['__id__']); // remove the hidden "new " row
        foreach ($antecedentespaciente as $antecedentepaciente) {
            $antecedente_paciente = new \app\models\AntecedentePaciente();
            $antecedente_paciente->id_paciente = $id_paciente;
            $antecedente_paciente->id_antecedente = $antecedentepaciente['id_antecedente'];
            $antecedente_paciente->save();
        }
        return true;
    }

    public function actionImprimir($id) {
        // OBTENEMOS EL MODELO
        $model = \app\models\Paciente::findOne($id);
        // OBTENEMOS SU RELACION DE MUCHOS A MUCHOS
        $findAll = \app\models\AntecedentePaciente::find()
                ->where('id_paciente = :id_paciente', [':id_paciente' => $model->id])
                ->all();
        $findAllDiagnosticos = \app\models\Diagnostico::find()
                ->where('id_paciente = :id_paciente', [':id_paciente' => $model->id])
                ->all();
        // OBTENEMOS EL USUARIO
        $usuario = \app\models\User::findIdentity($model->id_usuario);

        $mpdf = new Mpdf();
        $html = '
<style>
h1 {
	font-family: sans-serif;
	font-weight: bold;
	margin-top: 1em;
	margin-bottom: 0.5em;
}
h4 {
	font-family: sans-serif;
	font-weight: bold;
	margin-top: 1em;
	margin-bottom: 0.5em;
}
h5 {
	font-family: sans-serif;
	margin-top: 1em;
	margin-bottom: 0.5em;
}
h6 {
	font-family: sans-serif;
	margin-top: 1em;
	margin-bottom: 0.5em;
}
p {
	font-family: sans-serif;
        font-size: 9pt;
	margin-top: 1em;
	margin-bottom: 0.5em;
}
div {
	padding:1em;
	margin-bottom: 1em;
	text-align:justify;
}
</style>
<body >
<div style="border:0.1mm solid #220044; ">
    <table class="table">
        <tr>
            <td width="15%">
            ' . Html::img('@web/ima/logo.png') . '</td>
            <td width="85%" align="center"><h1>Informe de Evaluación</h1></td>
        </tr>
    </table>
    <h4>Datos del paciente</h4>
<div style="border:0.1mm solid #151515; background-color:#E6E6E6; ">
    <table width="100%" style="border:0.1mm solid #151515;">
    <tr>
        <td width="20%"><p>Nombre y Apellido</p>
        </td>
        <td width="30%"><h5>' . $model->nombre . '</h5>
        </td>
    </tr>
    <tr>
        <td width="20%"><p>Fecha de nacimiento</p>
        </td>
        <td width="30%"><h5>' . Yii::$app->formatter->asDate($model->fecha_nacimiento) . '</h5>
        </td>
        <td width="20%"><p>DNI</p>
        </td>
        <td width="30%"><h5>' . $model->dni . '</h5>
        </td>
    </tr>
    <tr>
        <td width="20%"><p>Obra Social</p>
        </td>
        <td width="30%"><h5>' . $model->obraSocial->nombre . '</h5>
        </td>
        <td width="20%"><p>Nº de afiliado</p>
        </td>
        <td width="30%"><h5>' . $model->id . '</h5>
        </td>
    </tr>
    </table>
</div>
    <h4>Diagnosticos</h4>
<div style="border:0.1mm solid #151515; background-color:#E6E6E6; ">
    <table width=100%>
    ';
        foreach ($findAllDiagnosticos as $diagnosticopaciente) {
            $html .= '<tr>';
            $html .= '<td><p>$' . ($diagnosticopaciente->resumen)
                    . '</p></td>';
            $html .= '</tr>';
        }
        $html .= '</table>
</div>
<h4>Antecedentes</h4>
<div style="border:0.1mm solid #151515; background-color:#E6E6E6; ">
    <table width=100%>
    ';
        foreach ($findAll as $antecedentepaciente) {
            $html .= '<tr>';
            $html .= '<td><p>* ' . $antecedentepaciente->antecedente->nombre
                    . '</p></td>';
            $html .= '</tr>';
        }
        $html .= '</table>
</div>';

        $mpdf->SetDisplayMode('fullpage');
        $mpdf->SetFooter('<h6 align="center">Domicilio: San Nicolas de Bari O 1316 Bº San Vicente / Tel: 4427849</h6></br>'
                . '<h6 align="center">Centro Santa Ana</h6></br>'
                . '<h6 align="center">Pagina {PAGENO} de {nbpg}');
        $mpdf->SetTitle('Imprimir informe');
        $mpdf->WriteHTML($html);
        $mpdf->Output();
        exit;
    }

    /**
     * Deletes an existing Paciente model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Paciente model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Paciente the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Paciente::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
