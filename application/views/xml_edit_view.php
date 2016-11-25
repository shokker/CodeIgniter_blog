<h1>Edit XML</h1>

<div class="addPost_form">
    <?php if($db_error) : ?>
        <div class="errors"><?= $db_error ?></div>
    <?php endif; ?>
    <?php

    echo form_open('view_xml/edit_xml'); ?>

    <?= form_fieldset('<h2>GrpHdr</h2>'); ?>
        <?= form_label('MsgId:', 'GrpHdr_MsgId'); ?>
            <?= form_input('GrpHdr_MsgId',set_value('GrpHdr_MsgId',$xml->CstmrCdtTrfInitn->GrpHdr->MsgId),'placeholder=MsgId class="form-control header_form" id="GrpHdr_MsgId"'); ?>
            <?= form_label('CreDtTm:', 'GrpHdr_CreDtTm'); ?>
            <?= form_input('GrpHdr_CreDtTm',set_value('GrpHdr_CreDtTm',$xml->CstmrCdtTrfInitn->GrpHdr->CreDtTm),'placeholder=CreDtTm class="form-control header_form" id="GrpHdr_CreDtTm"');?>
            <?= form_fieldset('Authstn',array('class'=>"inner_label")); ?>
                <?= form_label('Prtry:', 'GrpHdr_Authstn_Prtry',array('class'=>"new_item")); ?>
                <?= form_input('GrpHdr_Authstn_Prtry','','placeholder=Prtry class="form-control header_form" id="GrpHdr_Authstn_Prtry"');?>
            <?= form_fieldset_close(); ?>
            <?= form_label('NbOfTxs:', 'GrpHdr_NbOfTxs'); ?>
            <?= form_input('GrpHdr_NbOfTxs',set_value('GrpHdr_NbOfTxs',$xml->CstmrCdtTrfInitn->GrpHdr->NbOfTxs),'placeholder=NbOfTxs class="form-control header_form" id="GrpHdr_NbOfTxs"');?>
            <?= form_label('CtrlSum:', 'GrpHdr_CtrlSum'); ?>
            <?= form_input('GrpHdr_CtrlSum',set_value('GrpHdr_CtrlSum',$xml->CstmrCdtTrfInitn->GrpHdr->CtrlSum),'placeholder=GrpHdr_CtrlSum class="form-control header_form" id="GrpHdr_CtrlSum"');?>
            <?= form_fieldset('InitgPty',array('class'=>"inner_label")); ?>
                <?= form_label('Nm:', 'GrpHdr_InitgPty_Nm'); ?>
                <?= form_input('GrpHdr_InitgPty_Nm',set_value('GrpHdr_InitgPty_Nm',$xml->CstmrCdtTrfInitn->GrpHdr->InitgPty->Nm),'placeholder=Nm class="form-control header_form" id="GrpHdr_InitgPty_Nm"');?>
            <?= form_fieldset_close(); ?>
        <?= form_fieldset_close(); ?>

        <?= form_fieldset('<h2>PmtInf</h2>'); ?>
            <?= form_label('PmtInfId:', 'PmtInf_PmtInfId'); ?>
            <?= form_input('PmtInf_PmtInfId',set_value('PmtInf_PmtInfId',$xml->CstmrCdtTrfInitn->PmtInf->PmtInfId),'placeholder="PmtInfId" class="form-control header_form" id="PmtInf_PmtInfId"');?>
            <?= form_label('PmtMtd:', 'PmtInf_PmtMtd'); ?>
            <?= form_input('PmtInf_PmtMtd',set_value('PmtInf_PmtMtd',$xml->CstmrCdtTrfInitn->PmtInf->PmtMtd),'placeholder="PmtMtd" class="form-control header_form" id="PmtInf_PmtMtd"');?>
            <?= form_label('NbOfTxs:', 'PmtInf_NbOfTxs',array('class'=>"no_used_item")); ?>
            <?= form_input('PmtInf_NbOfTxs',set_value('PmtInf_NbOfTxs',$xml->CstmrCdtTrfInitn->PmtInf->NbOfTxs),'placeholder="NbOfTxs" class="form-control header_form" id="PmtInf_NbOfTxs"');?>
            <?= form_label('CtrlSum:', 'PmtInf_CtrlSum',array('class'=>"no_used_item")); ?>
            <?= form_input('PmtInf_CtrlSum',set_value('PmtInf_CtrlSum',$xml->CstmrCdtTrfInitn->PmtInf->CtrlSum),'placeholder="CtrlSum" class="form-control header_form" id="PmtInf_CtrlSum"');?>
            <?= form_fieldset('PmtTpInf',array('class'=>"inner_label")); ?>
                <?= form_label('InstrPrty:', 'PmtInf_PmtTpInf_InstrPrty',array('class'=>"new_item ")); ?>
                <?= form_input('PmtInf_PmtTpInf_InstrPrty','','placeholder="InstrPrty" class="form-control header_form" id="section2_InstrPrty"');?>
                <?= form_fieldset('SvcLvl',array('class'=>"inner_label")); ?>
                    <?= form_label('Cd:', 'PmtInf_PmtTpInf_SvcLvl_Cd'); ?>
                    <?= form_input('PmtInf_PmtTpInf_SvcLvl_Cd',set_value('PmtInf_PmtTpInf_SvcLvl_Cd',$xml->CstmrCdtTrfInitn->PmtInf->PmtTpInf->SvcLvl->Cd),'placeholder="Cd" class="form-control header_form" id="PmtInf_PmtTpInf_SvcLvl_Cd"');?>
                <?= form_fieldset_close(); ?>
            <?= form_fieldset_close(); ?>
            <?= form_label('ReqdExctnDt:', 'PmtInf_ReqdExctnDt'); ?>
            <?= form_input('PmtInf_ReqdExctnDt',set_value('PmtInf_ReqdExctnDt',$xml->CstmrCdtTrfInitn->PmtInf->ReqdExctnDt),'placeholder="ReqdExctnDt" class="form-control header_form" id="PmtInf_ReqdExctnDt"');?>
            <?= form_fieldset('Dbtr',array('class'=>"inner_label")); ?>
                <?= form_label('Nm:', 'PmtInf_Dbtr_Nm'); ?>
                <?= form_input('PmtInf_Dbtr_Nm',set_value('PmtInf_Dbtr_Nm',$xml->CstmrCdtTrfInitn->PmtInf->Dbtr->Nm),'placeholder="Nm" class="form-control header_form" id="PmtInf_Dbtr_Nm"');?>
                <?= form_fieldset('ID',array('class'=>"inner_label")); ?>
                    <?= form_fieldset('OrgId',array('class'=>"inner_label")); ?>
                        <?= form_label('BICOrBEI:', 'PmtInf_Dbtr_ID_OrgId_BICOrBEI',array('class'=>'no_used_item')); ?>
                        <?= form_input('PmtInf_Dbtr_ID_OrgId_BICOrBEI',set_value('PmtInf_Dbtr_ID_OrgId_BICOrBEI',$xml->CstmrCdtTrfInitn->PmtInf->Dbtr->Id->OrgId->BICOrBEI),'placeholder="BICOrBEI" class="form-control header_form" id="PmtInf_Dbtr_ID_OrgId_BICOrBEI"');?>
                    <?= form_fieldset_close(); ?>
                <?= form_fieldset_close(); ?>
            <?= form_fieldset_close(); ?>
            <?= form_fieldset('DbtrAcct',array('class'=>"inner_label")); ?>
                <?= form_fieldset('Id',array('class'=>"inner_label")); ?>
                    <?= form_label('Iban:', 'PmtInf_DbtrAcct_Id_Iban'); ?>
                    <?= form_input('PmtInf_DbtrAcct_Id_Iban',set_value('PmtInf_DbtrAcct_Id_Iban',$xml->CstmrCdtTrfInitn->PmtInf->DbtrAcct->Id->IBAN),'placeholder="Iban" class="form-control header_form" id="PmtInf_DbtrAcct_Id_Iban"');?>
                <?= form_fieldset_close(); ?>
            <?= form_fieldset_close(); ?>
            <?= form_fieldset('DbtrAgt',array('class'=>"inner_label")); ?>
                        <?= form_fieldset('FinInstnId',array('class'=>"inner_label")); ?>
                            <?= form_label('BIC:', 'PmtInf_DbtrAgt_FinInstnId_BIC'); ?>
                            <?= form_input('PmtInf_DbtrAgt_FinInstnId_BIC',set_value('PmtInf_DbtrAgt_FinInstnId_BIC',$xml->CstmrCdtTrfInitn->PmtInf->DbtrAgt->FinInstnId->BIC),'placeholder="BIC" class="form-control header_form" id="PmtInf_DbtrAgt_FinInstnId_BIC"');?>
                        <?= form_fieldset_close(); ?>
                    <?= form_fieldset_close(); ?>
            <?= form_fieldset_close(); ?>

    <?php echo
    form_submit('submit','edit xml','class="btn btn-default"'),
    form_close();
    ?>

    <div class="errors">
        <?= validation_errors() ?>
    </div>


</div>