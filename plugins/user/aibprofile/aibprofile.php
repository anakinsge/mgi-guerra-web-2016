<?php
/**
 * @Copyright
 * @package     AIB - Author Info Box
 * @author      Viktor Vogel <admin@kubik-rubik.de>
 * @version     3.1.2 - 2016-02-13
 * @link        https://joomla-extensions.kubik-rubik.de/aib-author-info-box
 *
 * @license     GNU/GPL
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
defined('_JEXEC') or die('Restricted access');

use Joomla\Utilities\ArrayHelper;

class PlgUserAibProfile extends JPlugin
{
	protected $db;

	public function __construct(& $subject, $config)
	{
		parent::__construct($subject, $config);
		$this->loadLanguage();

		$this->db = JFactory::getDbo();
	}

	/**
	 * Gets the data of the AIB profile plugin for valid form requests
	 *
	 * @param string  $context
	 * @param JObject $data
	 *
	 * @return boolean
	 */
	function onContentPrepareData($context, $data)
	{
		if(!in_array($context, array('com_users.user', 'com_admin.profile', 'com_users.profile')))
		{
			return true;
		}

		if(is_object($data))
		{
			if(empty($data->aibprofile) AND $data->id > 0)
			{
				$query = $this->db->getQuery(true);
				$query->select($this->db->quoteName(array('profile_key', 'profile_value')));
				$query->from($this->db->quoteName('#__user_aibprofiles'));
				$query->where(array($this->db->quoteName('user_id').' = '.(int)$data->id, $this->db->quoteName('profile_key').' LIKE '.$this->db->quote('aibprofile.%')));
				$query->order('ordering ASC');
				$this->db->setQuery($query);

				try
				{
					$result = $this->db->loadRowList();
				}
				catch(RuntimeException $e)
				{
					$this->_subject->setError($e->getMessage());

					return false;
				}

				$data->aibprofile = array();

				foreach($result as $value)
				{
					$value_clean = str_replace('aibprofile.', '', $value[0]);
					$data->aibprofile[$value_clean] = json_decode($value[1], true);

					// If JSON decode was not executed correctly, set the not decoded value
					if($data->aibprofile[$value_clean] === null)
					{
						$data->aibprofile[$value_clean] = $value[1];
					}
				}
			}
		}

		return true;
	}

	/**
	 * Loads the input fields in valid forms (due to security reason only backend forms are selected)
	 *
	 * @param JForm   $form
	 * @param JObject $data
	 *
	 * @return boolean
	 */
	function onContentPrepareForm($form, $data)
	{
		if(!($form instanceof JForm))
		{
			$this->_subject->setError('JERROR_NOT_A_FORM');

			return false;
		}

		if(!in_array($form->getName(), array('com_users.user', 'com_admin.profile')))
		{
			return true;
		}

		JForm::addFormPath(dirname(__FILE__).'/profiles');
		$form->loadFile('aibprofile', false);

		return true;
	}

	/**
	 * Saves the input data of the AIB profile plugin
	 *
	 * @param array   $data
	 * @param boolean $isNew
	 * @param boolean $result
	 * @param boolean $error
	 *
	 * @return boolean
	 * @throws Exception
	 */
	function onUserAfterSave($data, $isNew, $result, $error)
	{
		$user_id = ArrayHelper::getValue($data, 'id', 0, 'int');

		if(!empty($user_id) AND !empty($data['aibprofile']) AND $result == true)
		{
			try
			{
				$query = $this->db->getQuery(true);
				$query->delete($this->db->quoteName('#__user_aibprofiles'));
				$query->where(array($this->db->quoteName('user_id').' = '.(int)$user_id, $this->db->quoteName('profile_key').' LIKE '.$this->db->quote('aibprofile.%')));
				$this->db->setQuery($query);
				$this->db->execute();

				$tuples = array();
				$count = 1;

				foreach($data['aibprofile'] as $key => $value)
				{
					$tuples[] = $user_id.', '.$this->db->quote('aibprofile.'.$key).', '.$this->db->quote(json_encode($value)).', '.$count++;
				}

				$query = $this->db->getQuery(true);
				$query->insert($this->db->quoteName('#__user_aibprofiles'));
				$query->columns($this->db->quoteName(array('user_id', 'profile_key', 'profile_value', 'ordering')));
				$query->values($tuples);
				$this->db->setQuery($query);
				$this->db->execute();
			}
			catch(RuntimeException $e)
			{
				$this->_subject->setError($e->getMessage());

				return false;
			}
		}

		return true;
	}

	/**
	 * Removes all user profile information for the given user ID
	 *
	 * @param array   $user
	 * @param boolean $success
	 * @param string  $msg
	 *
	 * @return boolean
	 * @throws Exception
	 */
	function onUserAfterDelete($user, $success, $msg)
	{
		if(empty($success))
		{
			return false;
		}

		$user_id = ArrayHelper::getValue($user, 'id', 0, 'int');

		if(!empty($user_id))
		{
			try
			{
				$query = $this->db->getQuery(true);
				$query->delete($this->db->quoteName('#__user_aibprofiles'));
				$query->where(array($this->db->quoteName('user_id').' = '.(int)$user_id, $this->db->quoteName('profile_key').' LIKE '.$this->db->quote('aibprofile.%')));
				$this->db->setQuery($query);
				$this->db->execute();
			}
			catch(RuntimeException $e)
			{
				$this->_subject->setError($e->getMessage());

				return false;
			}
		}

		return true;
	}
}
