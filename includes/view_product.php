<?php
	defined('C5_EXECUTE') or die("Access Denied.");
	mb_internal_encoding("UTF-8");
	if( count( $productsSingle ) ):
?>
<?php foreach( $productsSingle as $product ):?>
	
	<section class="single_product">
<!--		FIRST ROW WITH 2 COLUMNS-->
		<div class="tc_row">
			<div class="tc_span leftside">				
				<?php if( trim( $product->get_CommercialText() ) ): ?>
					<div class="verpak">"<?=htmlentities( $product->get_CommercialText() ); ?></div>
				<?php endif; ?>
			   
				<?php if( trim( $product->get_Description() ) ): ?>
					<div class="description rcolor"><?= htmlentities( $product->get_Description() ); ?></div>
				<?php else:?>
					<div class="description rcolor">De zacht frisse smaak maakt deze mayonaise uitermate geschikt als basis voor sauzen of dressings, maar doet 't uiteraard ook goed als begeleidende saus bij gebakken aardappels en frites.</div>
				<?php endif; ?>
				
				<?php 
					$specificationList = $product->get_SpecificationsList();
					$specifications = $specificationList->get_Specifications();
				?>
				
				<?php foreach($specifications as $spec ):?>
					<?php if( trim( $spec->get_IngredientSummary() ) ): ?>
						<div class="specText font_style_spec">
							<h3 class="rcolor font_style_spec"><?=t("Ingredi&euml;nten")?></h3>	
							<?= htmlentities( $spec->get_IngredientSummary() )?>
						</div>
					<?php endif; ?>
					
					<?php if( trim( $spec->get_AllergenSummary() ) ): ?>
						<div class="specText font_style_spec">
							<h3 class="rcolor font_style_spec"><?=t("Allergenen")?></h3>    
							<?= htmlentities($spec->get_AllergenSummary()); ?>
						</div>
					<?php endif; ?>
					
					<?php 
						$nutrients = $spec->get_Nutrients();
						if(is_object( $nutrients )){ $nutrientsList = $nutrients->get_Nutrients(); }
					?>
					<?php if( count($nutrientsList) ): ?>
						<div class="specText font_style_spec">
							<h3 class="rcolor font_style_spec"><?=t("Voedingswaarde per 100 ml")?></h3>
							
							<?php $counter = 0; ?>
							<table class="nutrients" cellpadding="0" cellspacing="0">
								<?php foreach( $nutrientsList as $kn =>$nutrient ): ?>
								
									<?php if( $counter%2 == 0 ){ $color_class = "tbl_line1"; } else { $color_class = "tbl_line2"; } ?>
									<tr class="<?= $color_class ?>">
										<td><?= htmlentities($nutrient->get_Nutrient()->get_Name()); ?></td>
										<td><div><?= str_replace('.', ',', $nutrient->get_Value()).' '.$nutrient->get_Nutrient()->get_UnitOfMeasure()->get_Abbreviation(); ?></div></td>
									</tr>
									
									<?php $counter++ ?>
								
								<?php endforeach; ?>
							</table>
						</div>    
					<?php endif; ?>	
					
				<?php endforeach; ?>
				
				
			</div>
			<div class="tc_span rightside">
				<div class="productImage">
					<?php
						$productImage = htmlentities( $product->get_ProductImageURLFormatString() ); 
						$newProductImagelink = str_replace( "width={0}", "width=300", str_replace( "height={1}","height=300", $productImage));
					?>
					<img src="<?= $newProductImagelink  ?>">
					<a class="red_border_btn go_to_bb"><?= t("Bekijk product in de beeldbank") ?></a>
				</div>
			</div>
		</div>
<!--        SECOND ROW WITH 1 COLUMN-->
		<?php
			$packagesList = $product->get_ProductPackagesList();
			if( is_object( $packagesList ) ):
				$packages = $packagesList->get_ProductPackages();
				if( is_array( $packages ) && count( $packages ) ):
		?>
				<div>
					<div class="specText font_style_spec">
						<h3 class="rcolor font_style_spec"><?=t("Verpakkingen & Specificaties")?></h3>
						<p><?= t("Klik op de verpakking hieronder voor de specificaties."); ?></p>
						<ul class="packagesList clearfix">
							<?php foreach( $packages as $package ): ?>
							
								<?php
									$packImagelink = htmlentities( $package->get_PackageImageURLFormatString() );
									
									$imgl = explode( '&', substr( $packImagelink, strpos( $packImagelink,'?fileId=' ) ) );
									$imgID =  str_replace( '?fileId=', '', $imgl[0] );
									$newPackImagelink = str_replace( "width={0}", "width=100", str_replace( "height={1}","height=100", $packImagelink));
									
									$packLink = $package->get_PackageLink();
									$packName = htmlentities( $package->get_Name() );
									$packNetWeightValue =  $package->get_NetWeightValue();
									$packUnitOfMeasure = $package->get_NetWeightUnitOfMeasure()->get_Abbreviation();
								?>           
								<li>
									<div>
										<a class="link_title" href="<?= $packLink ?>">
											<?= $packName.'&nbsp'.$packNetWeightValue.$packUnitOfMeasure; ?>
										</a>
									</div>
									<div class="package_image" style="background: url('<?= $newPackImagelink ?>') no-repeat center;"></div>
                                                                        <div style="text-align: center;">
										<a class="link_button red_border_btn" href="<?= $packLink ?>">
											<?= t('Bekijk') ?>
										</a>
									</div>
									<div class="weight" style="display:none"><?= $packNetWeightValue; ?></div>
								</li>
							
							<?php endforeach;?>
						</ul>	
					</div>
				</div>
		
			<?php endif; ?>
		<?php endif; ?> 
   </section>
		   
<?php endforeach; ?>
	   <script type="text/javascript">
	  // $(document).ready(function(){
//	   function numOrdA(a, b){ return (a-b); }
//		   function sortElements(){
//			   var objArray = $('.pakName');
//			   var elem = new Array();
//			   $('.pakName').each(function(i,o){
//				   elem[i] = parseFloat($(o).children('.weight').html());
//			   })
//			   elem = elem.sort( numOrdA );
//			   $('.pakName').remove();
//			   for(var j = 0; j < elem.length; j++){
//				   objArray.each(function(i,o){
//					   if(parseFloat($(o).children('.weight').html()) == elem[j]){
//						   $('#ListVerpak').append($(o));
//					   }
//				   });
//			   }
//		   }
//		   sortElements();
//	   });
	   </script>
  
<?php endif; ?>