<?php

namespace LiamW\SplitReplyPermission;

use XF\AddOn\AbstractSetup;
use XF\AddOn\StepRunnerInstallTrait;
use XF\AddOn\StepRunnerUninstallTrait;
use XF\AddOn\StepRunnerUpgradeTrait;

class Setup extends AbstractSetup
{
	use StepRunnerInstallTrait;
	use StepRunnerUninstallTrait;
	use StepRunnerUpgradeTrait;

	public function postInstall(array &$stateChanges)
	{
		$this->applyGlobalPermission('forum', 'postReplyOwn', 'forum', 'postReply');
		$this->applyGlobalPermission('forum', 'postReplyOther', 'forum', 'postReply');

		$this->applyContentPermission('forum', 'postReplyOwn', 'forum', 'postReply');
		$this->applyContentPermission('forum', 'postReplyOther', 'forum', 'postReply');
	}
}