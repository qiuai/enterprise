<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $this->_tpl_vars['lngpack']['sitename'] ?></title>
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
					<option <?php if($i==1){ ?>selected<?php } ?> value="<?php echo $this->_tpl_vars['array'][$i]['link'] ?>" <a href="<?php echo $this->_tpl_vars['array'][$i]['link'] ?>"><?php echo $this->_tpl_vars['array'][$i]['lngtitle'] ?></a></option>
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
  <div class="c_c"><div class="banner">
    <object id="FlashID" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="976" height="327">
      <param name="movie" value="<?php echo $this->_tpl_vars['rootpath'] ?>Scripts/banner.swf" />
      <param name="quality" value="high" />
      <param name="wmode" value="opaque" />
      <param name="swfversion" value="8.0.35.0" />
      <param name="expressinstall" value="<?php echo $this->_tpl_vars['rootpath'] ?>Scripts/expressInstall.swf" />
      <object type="application/x-shockwave-flash" data="<?php echo $this->_tpl_vars['rootpath'] ?>Scripts/banner.swf" width="976" height="327">
        <!--<![endif]-->
        <param name="quality" value="high" />
        <param name="wmode" value="opaque" />
        <param name="swfversion" value="8.0.35.0" />
        <param name="expressinstall" value="<?php echo $this->_tpl_vars['rootpath'] ?>Scripts/expressInstall.swf" />
        <div>
          <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="获取 Adobe Flash Player" width="112" height="33" /></a></p>
        </div>
        <!--[if !IE]>-->
      </object>
      <!--<![endif]-->
    </object>
  </div>

  <div class="tiao">
    <div class="tiao_1">Products</div>
    <div class="tiao_2">News</div>
  </div>
  <div class="cpxw">
     <div class="cp_left">
         <div class="cp_l_1">
           <div class="cpyy_1">
           214adb21252b0af7b03s214s9typelist|mid:3,tid:29,att:1,level:2|60af7b03s21fs
				<?php if (count($this->_tpl_vars['array'])>0){$divid_i=1;for($i=0;$i<count($this->_tpl_vars['array']); $i++){?>
					<a onmouseover="hover(<?php echo $i ?>,<?php echo count($this->_tpl_vars['array']) ?>);"  href="<?php echo $this->_tpl_vars['array'][$i]['link'] ?>"><?php echo $this->_tpl_vars['array'][$i]['typename'] ?></a>
				<?php }} ?>
           </div>
				<?php if (count($this->_tpl_vars['array'])>0){$divid_i=1;for($i=0;$i<count($this->_tpl_vars['array']); $i++){?>
					<div 
                    <?php if($i==0){ ?> 
                    style="display:block;" 
                    <?php }else{ ?> 
                    style="display:none;" 
                    <?php } ?> 
                    class="cpyy_2" id="case<?php echo $i ?>">
                    <?php echo $this->cutstr($this->_tpl_vars['array'][$i]['content'],90) ?></div>
				<?php }} ?>	
		   214adb21252b0af7b03s214s9
           
<!---Tab-->
<script>
function hover(id, num)
{
	for(var i=0;i<num;i++)
	{
		document.getElementById("case" + i).style.display = "none";	
		if(id == i)
		{
			document.getElementById("case" + i).style.display = "block";
		}
	}
}
</script>
           
         </div>
         
         <div class="cp_l_2"><a href="4adb4912cd04e6fd3type|29|link4adb4912cd04e6fd3">Read more</a></div>    
     </div>
     <div class="xw_right">
         <div class="xw_r_1">
           <ul>
           214adb21252b0af7b03s214s9list|mid:1,max:2|60af7b03s21fs
				<?php if (count($this->_tpl_vars['array'])>0){$divid_i=1;for($i=0;$i<count($this->_tpl_vars['array']); $i++){?>
					<li><a title="<?php echo $this->_tpl_vars['array'][$i]['title'] ?>" href="<?php echo $this->_tpl_vars['array'][$i]['link'] ?>"><?php echo $this->cutstr($this->_tpl_vars['array'][$i]['ctitle'],13) ?> <img src="<?php echo $this->_tpl_vars['rootpath'] ?>images/hot.gif" /></a>
                    <span><?php echo $this->cutstr($this->_tpl_vars['array'][$i]['description'],25) ?>.......</span>
                    </li>
				<?php }} ?>
		   214adb21252b0af7b03s214s9
             <li>
           </ul>
         
         </div>
         <div class="xw_r_2"><a href="4adb4912cd04e6fd3type|28|link4adb4912cd04e6fd3">Read more</a></div>
     </div>
     
  </div>
  </div>
  <div class="c_r"></div>
  </div>
</div>
885BA145EFC8431D34F5CC06D142F143default/en/public/footer.html|885BA145EFC8431D34F5CC06D142F143