<?php if(count($this->_tpl_vars['array']) > 0){ ?>
<?php if (count($this->_tpl_vars['array'])>0){$divid_list=1;for($list=0;$list<count($this->_tpl_vars['array']); $list++){?>
<div class="infolist" onselectstart="return false;" title="<?php echo $this->_tpl_vars['array'][$list]['ordersn'] ?> - <?php echo $this->_tpl_vars['array'][$list]['ordertypename'] ?>" <?php if($this->powercheck('order','orderedit')==true ){ ?>ondblClick="javascript:parent.onbotton('<?php echo $this->_tpl_vars['ST']['ordermain_text_read_botton_title'] ?><?php echo $this->_tpl_vars['array'][$list]['ordersn'] ?>','index.php?archive=ordermain&action=orderedit&oid=<?php echo $this->_tpl_vars['array'][$list]['oid'] ?>&type=read&freshid='+Math.random()+'&iframename='+self.frameElement.getAttribute('name'),true,'orderread<?php echo $this->_tpl_vars['array'][$list]['oid'] ?>',self.frameElement.getAttribute('name'));"<?php } ?>>
	<table border="0" style="border-collapse:collapse" width="100%" bordercolor="#FFFFFF">
		<tr>
			<td width="4%"><?php if($this->_tpl_vars['array'][$list]['ordertype']==6 ){ ?><input type="checkbox" name="selectinfoid" value="<?php echo $this->_tpl_vars['array'][$list]['oid'] ?>"><?php } ?></td>
			<td width="7%"><?php echo $this->_tpl_vars['array'][$list]['oid'] ?></td>
			<td width="16%"><?php echo $this->_tpl_vars['array'][$list]['ordersn'] ?></td>
			<td width="8%"><?php echo $this->_tpl_vars['array'][$list]['ordertypename'] ?></td>
			<td width="10%"><?php echo $this->_tpl_vars['order_moneytype'] ?><?php echo $this->_tpl_vars['array'][$list]['orderamount'] ?></td>
			<td width="10%"><?php echo $this->_tpl_vars['array'][$list]['consignee'] ?></td>
			<td width="14%"><?php echo $this->timeformat($this->_tpl_vars['array'][$list]['addtime'],3) ?></td>
			<td width="10%"><?php if($this->_tpl_vars['array'][$list]['paytime']==0){ ?><B><?php echo $this->_tpl_vars['ST']['ordermain_text_paysn1'] ?></B><?php }else{ ?><?php echo $this->_tpl_vars['ST']['ordermain_text_paysn2'] ?><?php } ?></td>
			<td width="10%"><?php if($this->_tpl_vars['array'][$list]['shippingtime']==0){ ?><B><?php echo $this->_tpl_vars['ST']['ordermain_text_shippingsn1'] ?></B><?php }else{ ?><?php echo $this->_tpl_vars['ST']['ordermain_text_shippingsn2'] ?><?php } ?></td>
			<td width="11%" id="infotype">
				<table border="0" style="border-collapse:collapse" bordercolor="#FFFFFF">
					<tr>
						<?php if($this->powercheck('order','orderedit')==true ){ ?>
						<td><a class="setedit" onclick="javascript:parent.onbotton('<?php echo $this->_tpl_vars['ST']['ordermain_text_read_botton_title'] ?><?php echo $this->_tpl_vars['array'][$list]['ordersn'] ?>','index.php?archive=ordermain&action=orderedit&oid=<?php echo $this->_tpl_vars['array'][$list]['oid'] ?>&type=read&freshid='+Math.random()+'&iframename='+self.frameElement.getAttribute('name'),false,'orderread<?php echo $this->_tpl_vars['array'][$list]['oid'] ?>',self.frameElement.getAttribute('name'));" id="orderread<?php echo $this->_tpl_vars['array'][$list]['oid'] ?>" href="#body" title="<?php echo $this->_tpl_vars['array'][$list]['ordersn'] ?><?php echo $this->_tpl_vars['ST']['viewfield_botton'] ?>" hidefocus="true"><?php echo $this->_tpl_vars['ST']['viewfield_botton'] ?></a></td>
						<?php } ?>
						<?php if($this->powercheck('order','orderedit') && $this->_tpl_vars['array'][$list]['ordertype']==1){ ?>
						<td class="padding-left3"><a class="setedit" onclick="javascript:parent.onbotton('<?php echo $this->_tpl_vars['ST']['ordermain_edit_log'] ?><?php echo $this->_tpl_vars['array'][$list]['ordersn'] ?>','index.php?archive=ordermain&action=orderedit&oid=<?php echo $this->_tpl_vars['array'][$list]['oid'] ?>&type=edit&freshid='+Math.random()+'&iframename='+self.frameElement.getAttribute('name'),false,'orderedit<?php echo $this->_tpl_vars['array'][$list]['oid'] ?>',self.frameElement.getAttribute('name'));" id="orderedit<?php echo $this->_tpl_vars['array'][$list]['oid'] ?>" href="#body" title="<?php echo $this->_tpl_vars['array'][$list]['ordersn'] ?><?php echo $this->_tpl_vars['ST']['ordermain_edit_log'] ?>" hidefocus="true"><?php echo $this->_tpl_vars['ST']['setedit_botton'] ?></a></td>
						<?php } ?>
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