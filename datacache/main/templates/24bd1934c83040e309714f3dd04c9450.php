<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $this->_tpl_vars['type']['typename'] ?> - <?php echo $this->_tpl_vars['lngpack']['sitename'] ?></title>
<meta name="keywords" content="<?php echo $this->_tpl_vars['lngpack']['keyword'] ?>" />
<meta name="description" content="<?php echo $this->_tpl_vars['lngpack']['description'] ?>" />
<link href="<?php echo $this->_tpl_vars['rootpath'] ?>style/style.css" rel="stylesheet" type="text/css" />
<script src="<?php echo $this->_tpl_vars['rootpath'] ?>Scripts/swfobject_modified.js" type="text/javascript"></script>
</head>

<body>
<div class="top">
  <div class="top_k">
    <div class="top_left"><img src="<?php echo $this->_tpl_vars['rootpath'] ?>images/s_main_3.gif" /></div>
    <div class="top_right">
       <span>语言丨language</span>
	   <span>
		<select name="select" onChange="javascript:location.href=this.value;">
			214adb21252b0af7b03s214s9lng||60af7b03s21fs
				<?php if (count($this->_tpl_vars['array'])>0){$divid_i=1;for($i=0;$i<count($this->_tpl_vars['array']); $i++){?>
					<option value="<?php echo $this->_tpl_vars['array'][$i]['link'] ?>"><a href="<?php echo $this->_tpl_vars['array'][$i]['link'] ?>"><?php echo $this->_tpl_vars['array'][$i]['lngtitle'] ?></a></option>
				<?php }} ?>
			214adb21252b0af7b03s214s9
		</select>
	   </span>
    </div>
  </div>
  <div class="dh">
    <div class="dh_l"></div>
    <div class="dh_c">

				214adb21252b0af7b03s214s9menu|path:<?php echo $this->_tpl_vars['path'] ?>,current:<?php echo $this->_tpl_vars['current'] ?>|60af7b03s21fs
						<?php if (count($this->_tpl_vars['array'])>0){$divid_i=1;for($i=0;$i<count($this->_tpl_vars['array']); $i++){?>
						<a title="<?php echo $this->_tpl_vars['array'][$i]['title'] ?>" href="<?php echo $this->_tpl_vars['array'][$i]['link'] ?>"><?php echo $this->_tpl_vars['array'][$i]['title'] ?></a>
						<?php }} ?>
				214adb21252b0af7b03s214s9
    </div>
    <div class="dh_r"></div>
  </div>
</div>
<div class="center">
  <div class="c_k">
  <div class="c_l"></div>
  <div class="c_c">
  <div class="banner_2">
      <object id="FlashID" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="976" height="153">
        <param name="movie" value="<?php echo $this->_tpl_vars['rootpath'] ?>Scripts/banner1.swf" />
        <param name="quality" value="high" />
        <param name="wmode" value="opaque" />
        <param name="swfversion" value="8.0.35.0" />
        <!-- 此 param 标签提示使用 Flash Player 6.0 r65 和更高版本的用户下载最新版本的 Flash Player。如果您不想让用户看到该提示，请将其删除。 -->
        <param name="expressinstall" value="Scripts/expressInstall.swf" />
        <!-- 下一个对象标签用于非 IE 浏览器。所以使用 IECC 将其从 IE 隐藏。 -->
        <!--[if !IE]>-->
        <object type="application/x-shockwave-flash" data="<?php echo $this->_tpl_vars['rootpath'] ?>Scripts/banner1.swf" width="976" height="153">
          <!--<![endif]-->
          <param name="quality" value="high" />
          <param name="wmode" value="opaque" />
          <param name="swfversion" value="8.0.35.0" />
          <param name="expressinstall" value="<?php echo $this->_tpl_vars['rootpath'] ?>Scripts/expressInstall.swf" />
          <!-- 浏览器将以下替代内容显示给使用 Flash Player 6.0 和更低版本的用户。 -->
          <div>
            <h4>此页面上的内容需要较新版本的 Adobe Flash Player。</h4>
            <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="获取 Adobe Flash Player" width="112" height="33" /></a></p>
          </div>
          <!--[if !IE]>-->
        </object>
        <!--<![endif]-->
      </object>
    </div>