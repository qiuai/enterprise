
885BA145EFC8431D34F5CC06D142F143default/cn/public/header.html|885BA145EFC8431D34F5CC06D142F143
    
    <div class="news">
	  <div class="news_1">
        885BA145EFC8431D34F5CC06D142F143default/cn/public/location.html|885BA145EFC8431D34F5CC06D142F143
      </div>
      <div class="news_2">
        <div class="news_2_left">
          <ul>
		  214adb21252b0af7b03s214s9typelist|tid:<?php echo $this->_tpl_vars['type']['tid'] ?>,utid:<?php echo $this->_tpl_vars['type']['topid'] ?>|60af7b03s21fs
					<?php if (count($this->_tpl_vars['array'])>0){$divid_i=1;for($i=0;$i<count($this->_tpl_vars['array']); $i++){?>
						<li><img src="<?php echo $this->_tpl_vars['rootpath'] ?>images/s_main_26.gif" /><a title="<?php echo $this->_tpl_vars['array'][$i]['typename'] ?>" href="<?php echo $this->_tpl_vars['array'][$i]['link'] ?>"><?php echo $this->_tpl_vars['array'][$i]['typename'] ?></a></li>
					<?php }} ?>
		 214adb21252b0af7b03s214s9
          </ul>
        </div>
        <div class="news_2_right">
          <ul>
			<?php if (count($this->_tpl_vars['array'])>0){$divid_i=1;for($i=0;$i<count($this->_tpl_vars['array']); $i++){?>
				<li><a title="<?php echo $this->_tpl_vars['array'][$i]['title'] ?>" href="<?php echo $this->_tpl_vars['array'][$i]['link'] ?>"><?php echo $this->_tpl_vars['array'][$i]['ctitle'] ?></a><span>【<?php echo $this->timeformat($this->_tpl_vars['array'][$i]['addtime'],2) ?>】</span></li>
			<?php }} ?>
          </ul>
          <div class="fanye"><?php echo $this->_tpl_vars['pagebotton'] ?></div>
        </div>
      </div>
    </div>
    <div class="yuanjiao"></div>
  </div>
  <div class="c_r"></div>
  </div>
</div>
885BA145EFC8431D34F5CC06D142F143default/cn/public/footer.html|885BA145EFC8431D34F5CC06D142F143
