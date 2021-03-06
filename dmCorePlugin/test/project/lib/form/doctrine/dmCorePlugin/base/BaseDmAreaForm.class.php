<?php

/**
 * DmArea form base class.
 *
 * @method DmArea getObject() Returns the current form's model object
 *
 * @package    retest
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id$
 * @generator  Diem 5.4.0-DEV
 */
abstract class BaseDmAreaForm extends BaseFormDoctrine
{
  public function setup()
  {
    parent::setup();

		//column
		if($this->needsWidget('id')){
			$this->setWidget('id', new sfWidgetFormInputHidden());
			$this->setValidator('id', new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)));
		}
		//column
		if($this->needsWidget('type')){
			$this->setWidget('type', new sfWidgetFormInputText());
			$this->setValidator('type', new sfValidatorString(array('max_length' => 255)));
		}


		//one to many
		if($this->needsWidget('zones_list')){
			$this->setWidget('zones_list', new sfWidgetFormDmPaginatedDoctrineChoice(array('multiple' => true, 'model' => 'DmZone', 'expanded' => true)));
			$this->setValidator('zones_list', new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'DmZone', 'required' => false)));
		}

		//one to one
		if($this->needsWidget('dm_layout_id')){
			$this->setWidget('dm_layout_id', new sfWidgetFormDmDoctrineChoice(array('multiple' => false, 'model' => 'DmLayout', 'expanded' => false)));
			$this->setValidator('dm_layout_id', new sfValidatorDoctrineChoice(array('multiple' => false, 'model' => 'DmLayout', 'required' => false)));
		}
		//one to one
		if($this->needsWidget('dm_page_view_id')){
			$this->setWidget('dm_page_view_id', new sfWidgetFormDmDoctrineChoice(array('multiple' => false, 'model' => 'DmPageView', 'expanded' => false)));
			$this->setValidator('dm_page_view_id', new sfValidatorDoctrineChoice(array('multiple' => false, 'model' => 'DmPageView', 'required' => false)));
		}




    $this->widgetSchema->setNameFormat('dm_area[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
    
    // Unset automatic fields like 'created_at', 'updated_at', 'position'
    // override this method in your form to keep them
    parent::unsetAutoFields();
  }


  protected function doBind(array $values)
  {
    parent::doBind($values);
  }
  
  public function processValues($values)
  {
    $values = parent::processValues($values);
    return $values;
  }
  
  protected function doUpdateObject($values)
  {
    parent::doUpdateObject($values);
  }

  public function getModelName()
  {
    return 'DmArea';
  }

}
