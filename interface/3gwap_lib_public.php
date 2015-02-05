<?php

/*
  PHP version 5
  Copyright (c) 2002-2012 ECISP.CN
  声明：这不是一个免费的软件，请在许可范围内使用

  作者：Earclink E-mail:sv@earclink.com QQ:6326420
  http://www.ecisp.cn	http://www.easysitepm.com
 */

class lib_public extends connector {

	function lib_public() {
		$this->softbase();
		parent::start_pagetemplate();

		$this->pagetemplate->libfile = true;
	}

	function call_lng($lng, $para, $filename='lng', $outHTML=null) {
		if ($this->CON['is_alonelng']) return false;
		$para = $this->fun->array_getvalue($para);

		$lngpack = $lng ? $lng : $this->CON['is_lancode'];

		$lng = ($lng == 'big5') ? $this->CON['is_lancode'] : $lng;
		include admin_ROOT . 'datacache/' . $lng . '_pack.php';
		$db_table = db_prefix . 'lng';
		$rsList = $this->get_lng_array(null, 1);
		if (count($rsList['list']) > 0) {
			foreach ($rsList['list'] as $key => $value) {
				$rsList['list'][$key]['link'] = $this->get_waplink('lng', $value, $value['lng']);
			}
		}
		$this->pagetemplate->assign('lng', $lng);
		$this->pagetemplate->assign('lngpack', $LANPACK);
		$this->pagetemplate->assign('array', $rsList['list']);
		if (!empty($outHTML)) {
			$output = $this->pagetemplate->fetch(null, null, $outHTML);
		} else {
			$output = $this->pagetemplate->fetch($lng . '/lib/' . $filename);
		}
		return $output;
	}

	function call_menu($lng, $para, $filename='menu', $outHTML=null) {
		$para = $this->fun->array_getvalue($para);

		$lngpack = $lng ? $lng : $this->CON['is_lancode'];

		$lng = ($lng == 'big5') ? $this->CON['is_lancode'] : $lng;
		include admin_ROOT . 'datacache/' . $lng . '_pack.php';

		$db_table = db_prefix . 'typelist';
		$db_table2 = db_prefix . 'form_group';
		$db_table3 = db_prefix . 'bbs_typelist';
		$path = empty($para['path']) ? 0 : $para['path'];
		$current = empty($para['current']) ? 0 : $para['current'];

		$chacherray = array();
		$db_where = " WHERE lng='$lng' AND ismenu=1 AND isclass=1 AND iswap=1";
		$sql = 'SELECT * FROM ' . $db_table . $db_where . ' ORDER BY pid,tid';
		$chacherray = $this->dbcache->checkcache('typelist_array_' . $lng . '_wap', false);
		if (!$chacherray) {
			$rs = $this->db->query($sql);
			while ($rsList = $this->db->fetch_assoc($rs)) {
				$rsList['title'] = $rsList['typename'];
				$rsList['path'] = 'article';

				$rsList['current'] = $rsList['tid'];
				$rsList['link'] = $this->get_waplink('type', $rsList, $lngpack);
				$levelArray = $this->get_type_array(0, 0, $rsList['tid'], $rsList['lng']);
				if (is_array($levelArray['list'])) {
					foreach ($levelArray['list'] as $key => $value) {
						$levelArray['list'][$key]['title'] = $value['typename'];
						$levelArray['list'][$key]['path'] = 'article';
						$levelArray['list'][$key]['current'] = $value['tid'];
						$levelArray['list'][$key]['link'] = $this->get_waplink('type', $value, $lngpack);
					}
				}
				$rsList['larray'] = $levelArray['list'];
				$array[] = $rsList;
			}
			$chacherray = $this->dbcache->cachesave('typelist_array_' . $lng . '_wap', $array);
			$chacherray = $chacherray ? $chacherray : $array;
			unset($array);
		}
		$chacherray = is_array($chacherray) ? $chacherray : array();

		$forumlink = array();

		$memberlink = array();

		$menuarray = array();
		if (is_array($chacherray) && is_array($formarray)) {
			$menuarray = array_merge_recursive($chacherray, $formarray);
		} else {
			$menuarray = is_array($chacherray) ? $chacherray : $menuarray;
		}

		$homelink = array();
		$homelink[0]['title'] = $LANPACK['hometitle'];
		$homelink[0]['path'] = 'index';
		$homelink[0]['current'] = 0;
		$homelink[0]['link'] = $this->get_waplink('home', array(), $lngpack);
		$menuarray = array_merge_recursive($homelink, $menuarray, $forumlink, $memberlink);

		$this->pagetemplate->assign('array', $menuarray);
		$this->pagetemplate->assign('lng', $lng);
		$this->pagetemplate->assign('lngpack', $LANPACK);
		$this->pagetemplate->assign('current', $current);
		$this->pagetemplate->assign('path', $path);

		if (!empty($outHTML)) {
			$output = $this->pagetemplate->fetch(null, null, $outHTML);
		} else {
			$output = $this->pagetemplate->fetch($lng . '/lib/' . $filename);
		}
		return $output;
	}

	function call_messlist($lng, $para, $filename='messlist', $outHTML=null) {
		if ($this->CON['is_alonelng']) return false;
		$para = $this->fun->array_getvalue($para);
		$lngpack = $lng ? $lng : $this->CON['is_lancode'];
		$lng = ($lng == 'big5') ? $this->CON['is_lancode'] : $lng;
		include admin_ROOT . 'datacache/' . $lng . '_pack.php';

		$did = intval($para['did']);
		$ismess = intval($para['ismess']);
		$ismess = empty($ismess) ? 0 : $ismess;
		if (!$did || !$ismess) return false;

		$limit = intval($para['max']) ? intval($para['max']) : 5;

		$db_table = db_prefix . 'document_message';
		$db_where = " WHERE isclass=1 AND did=$did";
		$countnum = $this->db_numrows($db_table, $db_where);
		$sql = "SELECT * FROM $db_table $db_where ORDER BY dmid DESC LIMIT 0,$limit";
		$rs = $this->db->query($sql);
		while ($rsList = $this->db->fetch_assoc($rs)) {
			$array[] = $rsList;
		}
		$read['did'] = $did;
		$link = $this->get_waplink('messlist', $read, $lngpack);
		$messform = $this->get_waplink('messform', $read, $lngpack);

		$ec_member_username = $this->member_cookieview('username');
		if ($ec_member_username) {
			$reMem = $this->get_member($ec_member_username);
			$this->pagetemplate->assign('member', $reMem);
		}
		$this->pagetemplate->assign('seccodelink', $this->get_waplink('seccode'));
		$this->pagetemplate->assign('bbs_isseccode', $this->CON['bbs_isseccode']);
		$this->pagetemplate->assign('link', $link);
		$this->pagetemplate->assign('messform', $messform);
		$this->pagetemplate->assign('array', $array);
		$this->pagetemplate->assign('did', $did);
		$this->pagetemplate->assign('num', $countnum);
		$this->pagetemplate->assign('lng', $lng);
		$this->pagetemplate->assign('lngpack', $LANPACK);
		if (!empty($outHTML)) {
			$output = $this->pagetemplate->fetch(null, null, $outHTML);
		} else {
			$output = $this->pagetemplate->fetch($lng . '/lib/' . $filename);
		}
		return $output;
	}

	function call_list($lng, $para, $filename='list', $outHTML=null) {
		$para = $this->fun->array_getvalue($para);
		$lngpack = $lng ? $lng : $this->CON['is_lancode'];
		$lng = ($lng == 'big5') ? $this->CON['is_lancode'] : $lng;
		include admin_ROOT . 'datacache/' . $lng . '_pack.php';
		$mid = intval($para['mid']);
		if (empty($mid)) {
			return false;
		}

		$limit = empty($para['max']) ? 20 : intval($para['max']);

		$recommend = intval($para['dlid']);

		$tid = intval($para['tid']);

		$sid = intval($para['sid']);

		$rank = intval($para['rank']);
		$rank = empty($rank) ? 'DESC' : 'ASC';

		$sort = intval($para['sort']);
		$sort = empty($sort) ? 1 : $sort;
		switch ($sort) {
			case 1:
				$ordertype = 'did ' . $rank;
				break;
			case 2:
				$ordertype = 'pid ' . $rank;
				break;
			case 3:
				$ordertype = 'pid ' . $rank . ',pid ' . $rank;
				break;
			case 4:
				$ordertype = 'click ' . $rank;
				break;
		}

		$linkdid = $para['linkdid'];
		if (!empty($linkdid)) {

			$str_linkid = $this->fun->format_array_text($linkdid, '/');
			if (is_array($str_linkid)) {
				$linkdid = implode(',', $str_linkid);
			}
		}

		$db_table = db_prefix . 'document';
		$db_where = ' WHERE isclass=1 AND mid=' . $mid;

		if (!empty($linkdid)) {
			$db_where.=" AND did IN ($linkdid)";
		}

		if (!empty($recommend) && empty($linkdid)) {
			$db_where.=" AND FIND_IN_SET('$recommend',recommend)";
		}
		if (!empty($tid) && empty($linkdid)) {
			$db_where.=" AND " . $this->get_typeid($tid, 'tid', 0, $mid, 0, $lng);
		}
		if (!empty($sid) && empty($linkdid)) {
			$db_where.=" AND sid=$sid";
		}
		if (!empty($lng) && (empty($tid) && empty($sid) && empty($linkdid))) {
			$db_where.=" AND lng='$lng'";
		}

		$sql = "SELECT * FROM $db_table $db_where ORDER BY $ordertype LIMIT 0,$limit";
		$rs = $this->db->query($sql);
		while ($rsList = $this->db->fetch_assoc($rs)) {
			$rsList['buylink'] = $this->get_waplink('buylink', $rsList, $lngpack);
			$rsList['enqlink'] = $this->get_waplink('enqlink', $rsList, $lngpack);
			$rsList['link'] = $this->get_waplink('doc', $rsList, $lngpack);
			$rsList['ctitle'] = empty($rsList['color']) ? $rsList['title'] : "<font color='" . $rsList['color'] . "'>" . $rsList['title'] . "</font>";
			$typeread = $this->get_type($rsList['tid']);
			$attr = $this->get_document_attr($rsList['did']);
			$rsList['typename'] = $typeread['typename'];
			$rsList['typelink'] = $this->get_waplink('type', $typeread, $lngpack);
			$array[] = is_array($attr) ? array_merge($attr, $rsList) : $rsList;
		}
		$this->pagetemplate->assign('array', $array);
		$this->pagetemplate->assign('lng', $lng);
		$this->pagetemplate->assign('lngpack', $LANPACK);
		if (!empty($outHTML)) {
			$output = $this->pagetemplate->fetch(null, null, $outHTML);
		} else {
			$output = $this->pagetemplate->fetch($lng . '/lib/' . $filename);
		}
		return $output;
	}

	function call_plist($lng, $para, $filename='plist', $outHTML=null) {
		$para = $this->fun->array_getvalue($para);
		$lngpack = $lng ? $lng : $this->CON['is_lancode'];
		$lng = ($lng == 'big5') ? $this->CON['is_lancode'] : $lng;
		include admin_ROOT . 'datacache/' . $lng . '_pack.php';

		$did = intval($para['did']);
		if (empty($did)) {
			return false;
		}

		$class = intval($para['class']);
		$class = empty($class) ? 0 : $class;

		$db_table = db_prefix . 'document';

		$read = $this->get_documentview($did);
		if (!$read['tid']) {
			return false;
		}
		if ($class) {
			$sql = "SELECT * FROM $db_table WHERE isclass=1 AND tid = $read[tid] AND did > $did ORDER BY did ASC LIMIT 0,1";
		} else {
			$sql = "SELECT * FROM $db_table WHERE isclass=1 AND tid = $read[tid] AND did < $did ORDER BY did DESC LIMIT 0,1";
		}
		$rslist = $this->db->fetch_first($sql);
		if (is_array($rslist)) {
			$rslist['link'] = $this->get_waplink('doc', $rslist, $lngpack);
			$rslist['buylink'] = $this->get_waplink('buylink', $rslist, $lngpack);
			$rsList['enqlink'] = $this->get_waplink('enqlink', $rsList, $lngpack);
			$rslist['ctitle'] = empty($rslist['color']) ? $rslist['title'] : "<font color='" . $rslist['color'] . "'>" . $rslist['title'] . "</font>";
		}
		$this->pagetemplate->assign('read', $rslist);
		$this->pagetemplate->assign('lng', $lng);
		$this->pagetemplate->assign('lngpack', $LANPACK);
		if (!empty($outHTML)) {
			$output = $this->pagetemplate->fetch(null, null, $outHTML);
		} else {
			$output = $this->pagetemplate->fetch($lng . '/lib/' . $filename);
		}
		return $output;
	}

	function call_bread($lng, $para, $filename='read', $outHTML=null) {
		$para = $this->fun->array_getvalue($para);
		$lngpack = $lng ? $lng : $this->CON['is_lancode'];
		$lng = ($lng == 'big5') ? $this->CON['is_lancode'] : $lng;
		include admin_ROOT . 'datacache/' . $lng . '_pack.php';

		$tid = intval($para['tid']);
		if (empty($tid)) {
			return false;
		}

		$did = $this->get_type($tid, 'linkid');

		$read = $this->get_document($did);
		$read['link'] = $this->get_waplink('doc', $read, $lngpack);
		$read['buylink'] = $this->get_waplink('buylink', $read, $lngpack);
		$read['enqlink'] = $this->get_waplink('enqlink', $read, $lngpack);
		$read['ctitle'] = empty($read['color']) ? $read['title'] : "<font color='" . $read['color'] . "'>" . $read['title'] . "</font>";
		$read['content'] = html_entity_decode($read['content']);
		$docarray = array();
		$attr = $this->get_document_attr($rsList['did']);
		$docarray = is_array($attr) ? array_merge($attr, $read) : $read;
		unset($read);

		$this->pagetemplate->assign('read', $docarray);
		$this->pagetemplate->assign('lng', $lng);
		$this->pagetemplate->assign('lngpack', $LANPACK);
		if (!empty($outHTML)) {
			$output = $this->pagetemplate->fetch(null, null, $outHTML);
		} else {
			$output = $this->pagetemplate->fetch($lng . '/lib/' . $filename);
		}
		return $output;
	}

	function call_read($lng, $para, $filename='read', $outHTML=null) {
		$para = $this->fun->array_getvalue($para);
		$lngpack = $lng ? $lng : $this->CON['is_lancode'];
		$lng = ($lng == 'big5') ? $this->CON['is_lancode'] : $lng;
		include admin_ROOT . 'datacache/' . $lng . '_pack.php';
		$did = intval($para['did']);
		if (empty($did)) {
			return false;
		}

		$read = $this->get_document($did);
		$read['link'] = $this->get_waplink('doc', $read, $lngpack);
		$read['buylink'] = $this->get_waplink('buylink', $read, $lngpack);
		$read['enqlink'] = $this->get_waplink('enqlink', $read, $lngpack);
		$read['ctitle'] = empty($read['color']) ? $read['title'] : "<font color='" . $read['color'] . "'>" . $read['title'] . "</font>";
		$read['content'] = html_entity_decode($read['content']);

		$this->pagetemplate->assign('read', $docarray);
		$this->pagetemplate->assign('lng', $lng);
		$this->pagetemplate->assign('lngpack', $LANPACK);
		if (!empty($outHTML)) {
			$output = $this->pagetemplate->fetch(null, null, $outHTML);
		} else {
			$output = $this->pagetemplate->fetch($lng . '/lib/' . $filename);
		}
		return $output;
	}

	function call_bann($lng, $para, $filename='bann', $outHTML=null) {
		$para = $this->fun->array_getvalue($para);
		$lngpack = $lng ? $lng : $this->CON['is_lancode'];
		$lng = ($lng == 'big5') ? $this->CON['is_lancode'] : $lng;
		include admin_ROOT . 'datacache/' . $lng . '_pack.php';

		$atid = intval($para['atid']);
		if (empty($atid)) {
			return false;
		}
		$adtype = intval($para['adtype']);
		$adtype = empty($adtype) || $adtype > 3 ? 1 : $adtype;

		$limit = empty($para['max']) ? 10 : intval($para['max']);
		$time = time();
		$db_table = db_prefix . 'advert';
		$db_where = ' WHERE isclass=1 AND atid=' . $atid . ' AND adtype=' . $adtype;
		$bann_array = array();
		$sql = "SELECT * FROM $db_table $db_where ORDER BY pid,adid DESC LIMIT 0,$limit";
		$rs = $this->db->query($sql);
		while ($rsList = $this->db->fetch_assoc($rs)) {

			if ($rsList['istime'] == 1) {
				if ($rsList['starttime'] < time() && $rsList['endtime'] > time()) {
					$bann_array[] = $rsList;
				}
			} else {
				$bann_array[] = $rsList;
			}
		}
		$this->pagetemplate->assign('max', $limit);
		$this->pagetemplate->assign('adtype', $adtype);
		$this->pagetemplate->assign('array', $bann_array);
		$this->pagetemplate->assign('lng', $lng);
		$this->pagetemplate->assign('lngpack', $LANPACK);
		if (!empty($outHTML)) {
			$output = $this->pagetemplate->fetch(null, null, $outHTML);
		} else {
			$output = $this->pagetemplate->fetch($lng . '/lib/' . $filename);
		}
		return $output;
	}

	function call_path($lng, $para, $filename='path', $outHTML=null) {
		$para = $this->fun->array_getvalue($para);
		$lngpack = $lng ? $lng : $this->CON['is_lancode'];
		$lng = ($lng == 'big5') ? $this->CON['is_lancode'] : $lng;
		include admin_ROOT . 'datacache/' . $lng . '_pack.php';

		$pathtype = empty($para['type']) ? 'type' : $para['type'];
		$id = intval($para['id']);
		if (empty($id)) {
			return false;
		}
		switch ($pathtype) {
			case 'type':
				$typeview = $this->get_type($id);
				$path = $this->get_path($typeview, $lngpack);
				break;
			case 'forum':
				$typeview = $this->get_bbstype_view($id);
				$typeview['title'] = $typeview['typename'];
				$typeview['link'] = $this->get_waplink('forumlist', $typeview, $lngpack);
				$path[] = $typeview;
				break;
			case 'sub':
				$subview = $this->get_subjectlist_purview($id);
				$subview['title'] = $subview['subjectname'];
				$subview['link'] = $this->get_waplink('subtype', $subview, $lngpack);
				$path[] = $subview;
				break;
		}
		$homelink = $this->get_waplink('home', '', $lngpack);
		$this->pagetemplate->assign('homelink', $homelink);
		$this->pagetemplate->assign('array', $path);
		$this->pagetemplate->assign('lng', $lng);
		$this->pagetemplate->assign('lngpack', $LANPACK);
		if (!empty($outHTML)) {
			$output = $this->pagetemplate->fetch(null, null, $outHTML);
		} else {
			$output = $this->pagetemplate->fetch($lng . '/lib/' . $filename);
		}
		return $output;
	}

	function call_form($lng, $para, $filename='form', $outHTML=null) {
		$para = $this->fun->array_getvalue($para);
		$lngpack = $lng ? $lng : $this->CON['is_lancode'];
		$lng = ($lng == 'big5') ? $this->CON['is_lancode'] : $lng;
		include admin_ROOT . 'datacache/' . $lng . '_pack.php';

		$fgid = intval($para['fgid']);
		if (empty($fgid)) {
			return false;
		}

		$did = intval($para['did']);
		$did = empty($did) ? 0 : $did;
		$form = $this->get_form_purview($fgid);
		$form['action'] = $this->get_waplink('acform', $form, $lngpack);
		$attrread = $this->get_formatt($fgid);
		$this->pagetemplate->assign('form', $form);
		$this->pagetemplate->assign('array', $attrread);

		$this->pagetemplate->assign('seccodelink', $this->get_waplink('seccode'));
		$this->pagetemplate->assign('lng', $lng);
		$this->pagetemplate->assign('did', $did);
		$this->pagetemplate->assign('lngpack', $LANPACK);
		if (!empty($outHTML)) {
			$output = $this->pagetemplate->fetch(null, null, $outHTML);
		} else {
			$output = $this->pagetemplate->fetch($lng . '/lib/' . $filename);
		}
		return $output;
	}

	function call_typepart($lng, $para, $filename='typepart', $outHTML=null) {
		$para = $this->fun->array_getvalue($para);
		$lngpack = $lng ? $lng : $this->CON['is_lancode'];
		$lng = ($lng == 'big5') ? $this->CON['is_lancode'] : $lng;
		include admin_ROOT . 'datacache/' . $lng . '_pack.php';

		$mid = intval($para['mid']);
		$mid = empty($mid) ? 0 : $mid;
		$typeout = $this->get_type_array(0, $mid, 0, $lng, 1, 1);
		$typearray = $typeout['list'];
		if (count($typearray) > 0 && is_array($typearray)) {
			foreach ($typearray as $key => $value) {
				$value['link'] = $this->get_waplink('type', $value, $lngpack);
				$value['rsslink'] = $this->get_waplink('typerss', $value, $lngpack);
				$typelist[] = $value;
			}
		}
		$this->pagetemplate->assign('array', $typelist);
		$this->pagetemplate->assign('lng', $lng);
		$this->pagetemplate->assign('lngpack', $LANPACK);
		if (!empty($outHTML)) {
			$output = $this->pagetemplate->fetch(null, null, $outHTML);
		} else {
			$output = $this->pagetemplate->fetch($lng . '/lib/' . $filename);
		}
		return $output;
	}

	function call_typelist($lng, $para, $filename='typelist', $outHTML=null) {
		$para = $this->fun->array_getvalue($para);
		$lngpack = $lng ? $lng : $this->CON['is_lancode'];
		$lng = ($lng == 'big5') ? $this->CON['is_lancode'] : $lng;
		include admin_ROOT . 'datacache/' . $lng . '_pack.php';

		$tid = intval($para['utid']);

		$now_tid = intval($para['tid']);
		$level = intval($para['level']);
		$level = empty($level) ? 0 : $level;
		if (empty($tid)) {

			$tid = !empty($now_tid) ? $now_tid : $tid;
			if (empty($tid)) {
				return false;
			}
		}
		$tid = empty($tid) ? 0 : $tid;
		$db_table = db_prefix . 'typelist';
		$typeview = $this->get_type($tid);
		$typearray = $this->get_typelist(array(), 0, $tid, $now_tid, $typeview['lng'], $level, 1);
		$now_level = $typearray[$tid]['level'];
		unset($typearray[$tid]);

		if ($typeview['upid'] > 0) {

			foreach ($typearray as $key => $value) {
				$typearray[$key]['level'] = $value['level'] - $now_level;
			}
		}
		if (count($typearray) > 0 && is_array($typearray)) {
			foreach ($typearray as $key => $value) {
				$value['link'] = $this->get_waplink('type', $value, $lngpack);
				$value['rsslink'] = $this->get_waplink('typerss', $value, $lngpack);
				$typelist[] = $value;
			}
		}
		$this->pagetemplate->assign('nowtid', $now_tid);
		$this->pagetemplate->assign('array', $typelist);
		$this->pagetemplate->assign('lng', $lng);
		$this->pagetemplate->assign('lngpack', $LANPACK);
		if (!empty($outHTML)) {
			$output = $this->pagetemplate->fetch(null, null, $outHTML);
		} else {
			$output = $this->pagetemplate->fetch($lng . '/lib/' . $filename);
		}
		return $output;
	}

	function call_tags($lng, $para, $filename='tags', $outHTML=null) {
		$para = $this->fun->array_getvalue($para);
		$lngpack = $lng ? $lng : $this->CON['is_lancode'];
		$lng = ($lng == 'big5') ? $this->CON['is_lancode'] : $lng;
		include admin_ROOT . 'datacache/' . $lng . '_pack.php';
		$limit = intval($para[1]);
		$limit = empty($limit) ? 20 : $limit;

		$db_table = db_prefix . 'keylink';
		$db_where = ' WHERE isclass=1';
		$bann_array = array();
		$countnum = $this->db_numrows($db_table, $db_where);
		$sql = "SELECT * FROM $db_table $db_where ORDER BY pid,kid DESC LIMIT 0,$limit";
		$rs = $this->db->query($sql);
		while ($rsList = $this->db->fetch_assoc($rs)) {
			$rsList['num'] = $countnum;
			$rsList['link'] = $this->get_waplink('taglink', array('key' => $rsList['keywordname']), $lngpack);
			$rsList['title'] = $rsList['keywordname'];
			$array[] = $rsList;
		}
		$this->pagetemplate->assign('array', $array);
		$this->pagetemplate->assign('lng', $lng);
		$this->pagetemplate->assign('lngpack', $LANPACK);
		if (!empty($outHTML)) {
			$output = $this->pagetemplate->fetch(null, null, $outHTML);
		} else {
			$output = $this->pagetemplate->fetch($lng . '/lib/' . $filename);
		}
		return $output;
	}

	function call_subtype($lng, $para, $filename='subtype', $outHTML=null) {
		$para = $this->fun->array_getvalue($para);
		$lngpack = $lng ? $lng : $this->CON['is_lancode'];
		$lng = ($lng == 'big5') ? $this->CON['is_lancode'] : $lng;
		include admin_ROOT . 'datacache/' . $lng . '_pack.php';
		$mid = intval($para['mid']);
		if (empty($mid)) {
			return null;
		}
		$subtype = $this->get_subjectlist_array(0, $mid, $lng, 1);
		if ($subtype['num'] > 0 && is_array($subtype['list'])) {
			$subtypelist = $subtype['list'];
			foreach ($subtypelist as $key => $value) {
				$value['link'] = $this->get_waplink('subtype', $value, $lngpack);
				$value['title'] = $value['subjectname'];
				$subtypelist[$key] = $value;
			}
		}
		$this->pagetemplate->assign('array', $subtypelist);
		$this->pagetemplate->assign('lng', $lng);
		$this->pagetemplate->assign('lngpack', $LANPACK);
		if (!empty($outHTML)) {
			$output = $this->pagetemplate->fetch(null, null, $outHTML);
		} else {
			$output = $this->pagetemplate->fetch($lng . '/lib/' . $filename);
		}
		return $output;
	}

	function call_memmenu($lng, $para, $filename='member_menu', $outHTML=null) {
		$para = $this->fun->array_getvalue($para);
		$lngpack = $lng ? $lng : $this->CON['is_lancode'];
		$lng = ($lng == 'big5') ? $this->CON['is_lancode'] : $lng;
		include admin_ROOT . 'datacache/' . $lng . '_pack.php';
		$this->pagetemplate->assign('lngpack', $LANPACK);
		$this->pagetemplate->assign('mlink', $this->memberlink(array(), $lngpack));
		$this->pagetemplate->assign('lng', $lng);
		if (!empty($outHTML)) {
			$output = $this->pagetemplate->fetch(null, null, $outHTML);
		} else {
			$output = $this->pagetemplate->fetch($lng . '/lib/' . $filename);
		}
		return $output;
	}

	function call_im($lng, $para, $filename='im', $outHTML=null) {
		$para = $this->fun->array_getvalue($para);
		$lngpack = $lng ? $lng : $this->CON['is_lancode'];
		$lng = ($lng == 'big5') ? $this->CON['is_lancode'] : $lng;
		include admin_ROOT . 'datacache/' . $lng . '_pack.php';
		if (!$this->CON['is_imcall']) return null;
		$call['call_style'] = $this->CON['call_style'];
		$call['call_type'] = $this->CON['call_type'];
		$call['call_position'] = $this->CON['call_position'];
		$call_array = $this->get_calling_array(0, 1, $lng);
		$array = $call_array['list'];
		if (is_array($array)) {
			foreach ($array as $key => $value) {
				if ($value['type'] == 1) {
					$array[$key]['code'] = stripslashes(htmlspecialchars_decode($value['code']));
				}
			}
		}
		$this->pagetemplate->assign('bbslink', $this->get_waplink('forum', array(), $lngpack));
		$this->pagetemplate->assign('memberlink', $this->get_waplink('memberlogin', array(), $lngpack));
		$this->pagetemplate->assign('lng', $lng);
		$this->pagetemplate->assign('array', $array);
		$this->pagetemplate->assign('call', $call);
		$this->pagetemplate->assign('lngpack', $LANPACK);
		if (!empty($outHTML)) {
			$output = $this->pagetemplate->fetch(null, null, $outHTML);
		} else {
			$output = $this->pagetemplate->fetch($lng . '/lib/' . $filename);
		}
		return $output;
	}

	function call_skin($lng, $para, $filename=null, $outHTML=null) {
		$para = $this->fun->array_getvalue($para);
		$lngpack = $lng ? $lng : $this->CON['is_lancode'];
		$lng = ($lng == 'big5') ? $this->CON['is_lancode'] : $lng;
		include admin_ROOT . 'datacache/' . $lng . '_pack.php';

		$pagetemplatefile = $lng . '/lib/' . $para['tempaltes'];
		if (empty($para['tempaltes'])) return null;
		$regcontent = $this->CON['mem_did'] ? explode(',', $this->CON['mem_did']) : 0;
		if (is_array($regcontent)) {
			$regtid = array();
			foreach ($regcontent as $key => $value) {
				$strReg = explode(':', $value);
				$regtid[$strReg[0]] = $strReg[1];
			}
		}
		if ($regtid[$lng]) {
			$typeread = $this->get_type($regtid[$lng]);
			$reglink = $this->get_waplink('type', $typeread, $lngpack);
			$this->pagetemplate->assign('reglink', $reglink);
		}
		$this->pagetemplate->assign('lngpack', $LANPACK);
		$this->pagetemplate->assign('mlink', $this->memberlink(array(), $lng));
		$this->pagetemplate->assign('userid', $para['userid']);
		$this->pagetemplate->assign('username', $para['username']);
		$this->pagetemplate->assign('password', $para['password']);
		$this->pagetemplate->assign('email', $para['email']);
		$this->pagetemplate->assign('isclass', $para['isclass']);
		if (!empty($outHTML)) {
			$output = $this->pagetemplate->fetch(null, null, $outHTML);
		} else {
			$output = $this->pagetemplate->fetch($pagetemplatefile);
		}
		return $output;
	}

	function call_search($lng, $para, $filename='search', $outHTML=null) {
		$para = $this->fun->array_getvalue($para);
		$lngpack = $lng ? $lng : $this->CON['is_lancode'];
		$lng = ($lng == 'big5') ? $this->CON['is_lancode'] : $lng;
		include admin_ROOT . 'datacache/' . $lng . '_pack.php';
		$link = $this->get_waplink('search', array(), $lngpack);

		$mid = intval($para['mid']);
		$mid = empty($mid) ? 0 : $mid;
		$tid = intval($para['tid']);
		$tid = empty($tid) ? 0 : $tid;

		$att = intval($para['att']);
		$att = empty($att) ? 0 : $att;

		if (!$mid) {
			$modelarray = $this->get_model(0, $lng, 1, 1);
			$this->pagetemplate->assign('modelarray', $modelarray['list']);
		}

		if ($att) {
			$modelatt = $this->get_modelattArray($mid, false);
			if (is_array($modelatt)) {
				$searchatt = array();
				foreach ($modelatt as $key => $value) {
					if ($value['issearch']) {
						if ($value['inputtype'] == 'select' || $value['inputtype'] == 'radio') {
							foreach ($value['attrvalue'] as $key2 => $value2) {
								if ($docview[$value['attrname']] == $value2['name']) {
									$modelatt[$key]['attrvalue'][$key2]['selected'] = 'selected';
								}
							}
						} elseif ($value['inputtype'] == 'checkbox') {
							$expvale = explode(',', $docview[$value['attrname']]);
							foreach ($value['attrvalue'] as $key2 => $value2) {
								if (in_array($value2['name'], $expvale)) {
									$modelatt[$key]['attrvalue'][$key2]['selected'] = 'selected';
								}
							}
						} else {
							$modelatt[$key]['attrvalue'] = $docview[$value['attrname']];
						}
						$searchatt[] = $modelatt[$key];
					}
				}
			}
		}

		if ($tid) {
			$typearray = $this->get_typelist(array(), 0, $tid, 0, $lng, 0, 1);
			$now_level = $typearray[$tid]['level'];
			unset($typearray[$tid]);

			if ($typeview['upid'] > 0) {

				foreach ($typearray as $key => $value) {
					$typearray[$key]['level'] = $value['level'] - $now_level;
				}
			}
			if (count($typearray) > 0 && is_array($typearray)) {
				foreach ($typearray as $key => $value) {
					$typelist[] = $value;
				}
			}
			$this->pagetemplate->assign('array', $typelist);
		}

		$this->pagetemplate->assign('link', $link);
		$this->pagetemplate->assign('searchatt', $searchatt);
		$this->pagetemplate->assign('lng', $lng);
		$this->pagetemplate->assign('lngpack', $LANPACK);
		$this->pagetemplate->assign('mid', $mid);
		$this->pagetemplate->assign('tid', $tid);
		if (!empty($outHTML)) {
			$output = $this->pagetemplate->fetch(null, null, $outHTML);
		} else {
			$output = $this->pagetemplate->fetch($lng . '/lib/' . $filename);
		}
		return $output;
	}

	function call_login($lng, $para, $filename='search', $outHTML=null) {
		$para = $this->fun->array_getvalue($para);
		$lngpack = $lng ? $lng : $this->CON['is_lancode'];
		$lng = ($lng == 'big5') ? $this->CON['is_lancode'] : $lng;
		include admin_ROOT . 'datacache/' . $lng . '_pack.php';

		$mlink = $this->memberlink(array(), $lng);
		$this->pagetemplate->assign('lngpack', $LANPACK);
		$this->pagetemplate->assign('mlink', $mlink);
		$this->pagetemplate->assign('seccodelink', $this->get_waplink('seccode'));
		$this->pagetemplate->assign('mem_isseccode', $this->CON['mem_isseccode']);

		$ec_member_username = $this->member_cookieview('username');

		$ec_member_username_id = $this->member_cookieview('userid');

		if (!empty($ec_member_username) && !empty($ec_member_username_id) && !$this->CON['is_html']) {
			$this->pagetemplate->assign('username', $ec_member_username);
			$output = $this->pagetemplate->fetch($lng . '/lib/member_info');
		} else {
			$output = $this->pagetemplate->fetch($lng . '/lib/member_login');
		}
		return $output;
	}

	function call_order($lng, $para, $filename='order', $outHTML=null) {
		$para = $this->fun->array_getvalue($para);
		$lngpack = $lng ? $lng : $this->CON['is_lancode'];
		$lng = ($lng == 'big5') ? $this->CON['is_lancode'] : $lng;
		include admin_ROOT . 'datacache/' . $lng . '_pack.php';

		$cartid = $this->fun->accept('ecisp_order_list', 'C');
		$cartid = stripslashes(htmlspecialchars_decode($cartid));
		$uncartid = !empty($cartid) ? unserialize($cartid) : 0;

		$total = $this->fun->accept('ecisp_order_productmoney', 'C');
		$total = empty($total) ? 0 : $total;
		$buylink = $this->get_waplink('order', array(), $lngpack);
		$this->pagetemplate->assign('lngpack', $LANPACK);
		$this->pagetemplate->assign('buylink', $buylink);

		$this->pagetemplate->assign('ordertotal', number_format($total, 2));

		$this->pagetemplate->assign('total', $total);
		$this->pagetemplate->assign('uncartid', count($uncartid));
		$this->pagetemplate->assign('cartid', $cartid);
		if (!empty($outHTML)) {
			$output = $this->pagetemplate->fetch(null, null, $outHTML);
		} else {
			$output = $this->pagetemplate->fetch($lng . '/lib/' . $filename);
		}
		return $output;
	}

	function call_bbslist($lng, $para, $filename='bbslist', $outHTML=null) {
		$para = $this->fun->array_getvalue($para);
		$lngpack = $lng ? $lng : $this->CON['is_lancode'];
		$lng = ($lng == 'big5') ? $this->CON['is_lancode'] : $lng;
		include admin_ROOT . 'datacache/' . $lng . '_pack.php';

		$btid = intval($para['btid']);
		if (!$btid) {
			return null;
		}

		$limit = empty($para['max']) ? 15 : intval($para['max']);
		$db_table = db_prefix . 'bbs';
		$db_where = " WHERE upbid=0 AND isclass=1 AND btid=$btid";
		$sql = "SELECT * FROM $db_table $db_where ORDER BY bid DESC LIMIT 0,$limit";
		$rs = $this->db->query($sql);
		while ($rsList = $this->db->fetch_assoc($rs)) {
			$rsList['link'] = $this->get_waplink('forumread', $rsList, $lngpack);
			$array[] = $rsList;
		}
		$this->pagetemplate->assign('array', $array);
		$this->pagetemplate->assign('lng', $lng);
		$this->pagetemplate->assign('lngpack', $LANPACK);
		if (!empty($outHTML)) {
			$output = $this->pagetemplate->fetch(null, null, $outHTML);
		} else {
			$output = $this->pagetemplate->fetch($lng . '/lib/' . $filename);
		}
		return $output;
	}

	function call_invite($lng, $para, $filename='invite', $outHTML=null) {
		$para = $this->fun->array_getvalue($para);
		$lngpack = $lng ? $lng : $this->CON['is_lancode'];
		$lng = ($lng == 'big5') ? $this->CON['is_lancode'] : $lng;
		include admin_ROOT . 'datacache/' . $lng . '_pack.php';
		$mlvid = intval($para['mlvid']);
		if (empty($mlvid)) {
			return null;
		}

		$inviteread = $this->get_mailinvite_view($mlvid);
		$link = $this->get_waplink('invite', $inviteread, $lngpack);
		$this->pagetemplate->assign('link', $link);
		$this->pagetemplate->assign('read', $inviteread);
		$this->pagetemplate->assign('lng', $lng);
		$this->pagetemplate->assign('lngpack', $LANPACK);
		if (!empty($outHTML)) {
			$output = $this->pagetemplate->fetch(null, null, $outHTML);
		} else {
			$output = $this->pagetemplate->fetch($lng . '/lib/' . $filename);
		}
		return $output;
	}

	function field_type($tid, $returnname='typename', $lng='') {
		if (empty($tid)) return false;
		$lngpack = $lng ? $lng : $this->CON['is_lancode'];
		$lng = ($lng == 'big5') ? $this->CON['is_lancode'] : $lng;

		$returnname = empty($returnname) ? 'typename' : $returnname;
		$typeread = $this->get_type($tid);
		$typeread['link'] = $this->get_waplink('type', $typeread, $lngpack);
		return $typeread[$returnname];
	}

}

?>
