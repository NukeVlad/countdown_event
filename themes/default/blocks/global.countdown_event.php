<?php

/**
 * @Project NUKEVIET 4.x
 * @Author Thinhweb Blog <thinhwebhp@gmail.com>
 * @Copyright (C) 2017 Nukevlad. http://nukeviet.ru/ All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Sat, 01 Dec 2018 17:12:26 GMT
 */

if( ! defined( 'NV_MAINFILE' ) ) die( 'Stop!!!' );

if( ! nv_function_exists( 'nv_dem_nguoc_su_kien' ) )
{
	function nv_countdown_event_config( $module, $data_block, $lang_block )
	{
		$html .= '<tr>';
		$html .= '	<td>' . $lang_block['name_event_countdown'] . '</td>';
		$html .= '	<td><input class="w300 form-control" type="text" name="config_name_event_countdown" value="' . $data_block['name_event_countdown'] . '"/></td>';
		$html .= '</tr>';


		$html .= '<tr>';
		$html .= '	<td>' . $lang_block['ngay'] . '</td>';
		
		$html .='<td> <div style="float:left; padding: 5px">';
		$ck = !$data_block['config_thoigian'] ? 'checked="checked"' : '';
		$html .= '	<input type="radio" name="config_thoigian" value="0" '. $ck .'/>' . $lang_block['beginning_event'] . '</br>';
		$ck = $data_block['config_thoigian'] ? 'checked="checked"' : '';
		$html .= '	<input type="radio" name="config_thoigian" value="1" ' . $ck . '/>' . $lang_block['end_event'] . '</div>';
		
		
		$html .=  ' <div style="float:left;" > <div class="controls"> <em class="span1">День /</em> <em class="span1">Месяц /</em> <em class="span1">Год (Цифрами)</em></div> <div class="controls"> <input class="span1" placeholder="Ngày" type="text" name="config_ngay" value="' . $data_block['ngay'] . '"/>';
		$html .=  '  <input  class="span1" placeholder="Tháng" type="text" name="config_thang" value="' . $data_block['thang'] . '"/>';
		$html .=  ' <input class="span1" placeholder="Năm" type="text" name="config_nam" value="' . $data_block['nam'] . '"/></div></div></td>';
		$html .= '</tr>';
		

		$html .= '<tr>';
		$html .= '	<td>' . $lang_block['link_module_redday'] . '</td>';
		$html .= '	<td><input class="w300 form-control"  type="text" name="config_link_module_redday" value="' . $data_block['link_module_redday'] . '"/></td>';
		$html .= '</tr>';

		$html .= '<tr>';
		$html .= '	<td>' . $lang_block['link_module_redday_anchor'] . '</td>';
		$html .= '	<td><input class="w300 form-control"  type="text" name="config_link_module_redday_anchor" value="' . $data_block['link_module_redday_anchor'] . '"/></td>';
		$html .= '</tr>';

		return $html;
	}

	function nv_countdown_event_submit( $module, $lang_block )
	{
		global $nv_Request;
		$return = array();
		$return['error'] = array();
		$return['config']['name_event_countdown'] = $nv_Request->get_title( 'config_name_event_countdown', 'post' );
		$return['config']['ngay'] = $nv_Request->get_title( 'config_ngay', 'post' );
		$return['config']['thang'] = $nv_Request->get_title( 'config_thang', 'post' );
		$return['config']['nam'] = $nv_Request->get_title( 'config_nam', 'post' );
		$return['config']['config_thoigian'] = $nv_Request->get_int( 'config_thoigian', 'post', 0 );
		$return['config']['link_module_redday'] = $nv_Request->get_title( 'config_link_module_redday', 'post' );
		$return['config']['link_module_redday_anchor'] = $nv_Request->get_title( 'config_link_module_redday_anchor', 'post' );
		return $return;
	}

	function nv_dem_nguoc_su_kien( $block_config )
	{
		global $global_config, $site_mods;

		if( file_exists( NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/blocks/global.countdown_event.tpl' ) )
		{
			$block_theme = $global_config['module_theme'];
		}
		elseif( file_exists( NV_ROOTDIR . '/themes/' . $global_config['site_theme'] . '/blocks/global.countdown_event.tpl' ) )
		{
			$block_theme = $global_config['site_theme'];
		}
		else
		{
			$block_theme = 'default';
		}

		$xtpl = new XTemplate( 'global.countdown_event.tpl', NV_ROOTDIR . '/themes/' . $block_theme . '/blocks' );
		$xtpl->assign( 'NV_BASE_SITEURL', NV_BASE_SITEURL );
		$xtpl->assign( 'BLOCK_THEME', $block_theme );
		$xtpl->assign( 'DATA', $block_config );
		if( ! empty( $block_config['name_event_countdown'] ) )
		{
			$xtpl->parse( 'main.name_event_countdown' );
		}
		if( ! empty( $block_config['ngay'] ) )
		{
			$xtpl->parse( 'main.ngay' );
		}
		if( ! empty( $block_config['thang'] ) )
		{
			$xtpl->parse( 'main.thang' );
		}
		if( empty( $block_config['nam'] ) )
		{
			$xtpl->parse( 'main.nam' );
		}

		if( empty( $block_config['config_thoigian'] ) )
		{
			$xtpl->parse( 'main.beginning_event' );
		}
		else
		{
			$xtpl->parse( 'main.end_event' );
		}
		if( ! empty( $block_config['link_module_redday'] ) )
		{
			$xtpl->parse( 'main.link_module_redday' );
		}
		if( ! empty( $block_config['link_module_redday_anchor'] ) )
		{
			$xtpl->parse( 'main.link_module_redday_anchor' );
		}
		$xtpl->parse( 'main' );
		return $xtpl->text( 'main' );
	}
}

if( defined( 'NV_SYSTEM' ) )
{
	$content = nv_dem_nguoc_su_kien( $block_config );
}