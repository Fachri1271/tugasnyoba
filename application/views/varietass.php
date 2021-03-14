<?php	if(! defined('BASEPATH')) exit('No direct script access allowed');	?>

 <div class="row gutters-tiny">
 <?php 
         foreach($daftar_varietas as $listvar){
         $idvar=$listvar->IDvarietas;
        $picture = $listvar->photo;
 if ($picture!='' AND $picture!='no_image.jpg'){ ?>
                 <div class="col-md-6 col-xl-2">
             <a class="block block-transparent" href="<?php echo base_url();?>varietas/detail_varietas/<?php echo $idvar?>">
                 <div class="" style="background-image: url('<?php echo base_url();?>assets/gambar/varietas/<?php echo $picture;?>');">
                     <div class="py-50 text-center"></div>
                                                 <div class="block-content block-content-full block-rounded block-content-sm bg-black-op-25">
                         <div class="font-size-sm font-w700 mb-0 text-white text-center"><?php echo ucwords($listvar->nmvarietas); ?></div>
                     </div>
                                         </div>
                                 </a>
         </div>
         <?php } else { ?>
                 <div class="col-md-6 col-xl-2">
             <a class="block block-transparent" href="<?php echo base_url();?>varietas/detail_varietas/<?php echo $idvar?>">
                 <div class="block-content block-content-full text-right bg-image" style="background-image: url('<?php echo base_url();?>assets/gambar/varietas/noimage.jpg');">
                     <div class="py-50 text-center"></div>
                                                 <div class="block-content block-content-full block-rounded block-content-sm bg-black-op-25">
                         <div class="font-size-sm font-w700 mb-0 text-white text-center"><?php echo ucwords($listvar->nmvarietas); ?></div>
                     </div>
                 </div>
             </a>
         </div>
         <?php }
         } ?> 
 </div>
	
