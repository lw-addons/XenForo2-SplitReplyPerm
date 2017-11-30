<?php

namespace LiamW\SplitReplyPermission\XF\Entity;

class Thread extends XFCP_Thread
{
	public function canReply(&$error = null)
	{
		$canReply = parent::canReply($error);

		if (\XF::visitor()->user_id == $this->user_id && !\XF::visitor()
				->hasNodePermission($this->node_id, 'postReplyOwn'))
		{
			$canReply = false;
		}

		if (\XF::visitor()->user_id != $this->user_id && !\XF::visitor()
				->hasNodePermission($this->node_id, 'postReplyOther'))
		{
			$canReply = false;
		}

		return $canReply;
	}
}