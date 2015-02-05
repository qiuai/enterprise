<?php if(count($this->_tpl_vars['array']) > 0){ ?>
<?php if (count($this->_tpl_vars['array'])>0){$divid_list=1;for($list=0;$list<count($this->_tpl_vars['array']); $list++){?>
<div class="infolist" title="<?php echo $this->_tpl_vars['array'][$list]['table'] ?>">
	<table border="0" style="border-collapse:collapse" width="100%" bordercolor="#FFFFFF">
		<tr>
			<td width="20%"><?php echo $this->_tpl_vars['array'][$list]['table'] ?></td>
			<td width="10%"><?php echo $this->_tpl_vars['array'][$list]['type'] ?></td>
			<td width="10%"><?php echo $this->_tpl_vars['array'][$list]['dbnum'] ?></td>
			<td width="15%"><?php echo $this->_tpl_vars['array'][$list]['dbsize'] ?></td>
			<td width="10%"><?php echo $this->_tpl_vars['array'][$list]['dbchip'] ?></td>
			<td width="10%"><?php echo $this->_tpl_vars['array'][$list]['status'] ?></td>
			<td width="13%"><?php echo $this->_tpl_vars['array'][$list]['charset'] ?></td>
			<td width="12%" id="infotype">
				<table>
					<tr>
						<td>
							<a class="setedit2" onclick="javascript:submiturl('index.php?archive=sqlmanage&action=optimize&dbtable=<?php echo $this->_tpl_vars['array'][$list]['table'] ?>','index.php?archive=management&action=load','<?php echo $this->_tpl_vars['ST']['run_ok'] ?>','<?php echo $this->_tpl_vars['ST']['run_no'] ?>',false,'','selectform','selectall','check_all')" href="#body" title="<?php echo $this->_tpl_vars['ST']['sqllist_optimize_set'] ?>" hidefocus="true"><?php echo $this->_tpl_vars['ST']['sqllist_optimize_set'] ?></a>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</div>
<?php }} ?>
<?php }else{ ?>
<div class="infolist">
<table border="0" style="border-collapse:collapse" width="100%" bordercolor="#FFFFFF">
	<tr>
	    <td align="center"><?php echo $this->_tpl_vars['ST']['list_nothing_title'] ?></td>
	</tr>
</table>
</div>
<?php } ?>