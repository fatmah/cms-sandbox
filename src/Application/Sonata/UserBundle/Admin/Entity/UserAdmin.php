<?php


namespace Application\Sonata\UserBundle\Admin\Entity;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;

use FOS\UserBundle\Model\UserManagerInterface;

class UserAdmin extends Admin
{
	protected $formOptions = array(
			'validation_groups' => 'Profile'
	);

	/**
	 * {@inheritdoc}
	*/
	protected function configureListFields(ListMapper $listMapper)
	{
		$listMapper
		->addIdentifier('username')
		->add('email')
		->add('enabled', null, array('editable' => true))
		->add('locked', null, array('editable' => true))
		->add('createdAt');
		$listMapper->add('_action', 'actions',array('label'=> 'Action','actions' => array('edit' => array(), 'delete' => array())));
	}

	/**
	 * {@inheritdoc}
	 */
	protected function configureDatagridFilters(DatagridMapper $filterMapper)
	{
		$filterMapper
		->add('firstname')
		->add('lastname')
		->add('username')
		->add('email')
		;
	}


	/**
	 * {@inheritdoc}
	 */
	protected function configureFormFields(FormMapper $formMapper)
	{
		$formMapper
		->with('Profile')
		->add('username')
		->add('firstname',null,array('required' => false))
		->add('lastname',null,array('required' => false))
		->add('email')
		->add('plainPassword', 'text', array('required' => false))
		->end()
		;
		if (!$this->getSubject()->hasRole('ROLE_SUPER_ADMIN')) {
			$formMapper
			->with('Management')
			->add('roles', 'sonata_security_roles', array(
					'expanded' => true,
					'multiple' => true,
					'required' => false
			))
			->add('locked', null, array('required' => false))
			->add('expired', null, array('required' => false))
			->add('enabled', null, array('required' => false))
			->add('credentialsExpired', null, array('required' => false))
			->end()
			;
		}
	}

	/**
	 * {@inheritdoc}
	 */
	public function preUpdate($user)
	{
		$this->getUserManager()->updateCanonicalFields($user);
		$this->getUserManager()->updatePassword($user);
	}

	/**
	 * @param UserManagerInterface $userManager
	 */
	public function setUserManager(UserManagerInterface $userManager)
	{
		$this->userManager = $userManager;
	}

	/**
	 * @return UserManagerInterface
	 */
	public function getUserManager()
	{
		return $this->userManager;
	}
}
