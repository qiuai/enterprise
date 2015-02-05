
885BA145EFC8431D34F5CC06D142F143default/cn/public/header.html|885BA145EFC8431D34F5CC06D142F143

<div id="sitemap">
214adb21252b0af7b03s214s9menu|path:<?php echo $this->_tpl_vars['path'] ?>,current:<?php echo $this->_tpl_vars['current'] ?>|60af7b03s21fs

     <?php if (count($this->_tpl_vars['array'])>0){$divid_i=1;for($i=0;$i<count($this->_tpl_vars['array']); $i++){?>

              <div class="levelo">
				<a title="<?php echo $this->_tpl_vars['array'][$i]['title'] ?>" href="<?php echo $this->_tpl_vars['array'][$i]['link'] ?>"><?php echo $this->_tpl_vars['array'][$i]['title'] ?></a>
			  </div>

              <?php if (count($this->_tpl_vars['array'][$i]['larray'])>0){$divid_ii=1;for($ii=0;$ii<count($this->_tpl_vars['array'][$i]['larray']); $ii++){?>

                    <div class="levelt">
						 <a class="novlink" href="<?php echo $this->_tpl_vars['array'][$i]['larray'][$ii]['link'] ?>" title="<?php echo $this->_tpl_vars['array'][$i]['larray'][$ii]['title'] ?>"><?php echo $this->_tpl_vars['array'][$i]['larray'][$ii]['title'] ?></a>
					</div>

              <?php }} ?> 

     <?php }} ?>

214adb21252b0af7b03s214s9

</div>

885BA145EFC8431D34F5CC06D142F143default/cn/public/footer.html|885BA145EFC8431D34F5CC06D142F143