<?php
$a = 45;

if ($view_mode == "teaser"):
  $product = commerce_product_load($field_televizor['und'][0]['product_id']);
  ?>
  <article class="product">
      <h4 class="title">
          <a href="/node/<?php print $node->nid; ?>"> <?php print $title; ?></a>
      </h4>
      <?php
      if (isset($product->field_dijagonala['und'][0])):
        $dijagonala = taxonomy_term_load($product->field_dijagonala['und'][0]['tid']);
        ?>
        <div class="image inline">
            <a href="/node/<?php print $node->nid; ?>"><img class="img-responsive" src="<?php print file_create_url($product->field_image_tv['und'][0]['uri']); ?>" title="<?php print $product->field_image_tv['und'][0]['title']; ?>" /></a>
        </div>
        <div class="inline">
            <div class="dijagonala">
                <span class="field-title">Dijagonala: </span><?php print $dijagonala->name; ?>
            </div>
          <?php endif; ?>
          <?php
          if (isset($product->commerce_price['und'][0]['amount'])):
            ?>
            <div class="price">
                <span class="field-title">Cena</span>

                <?php
                print number_format($product->commerce_price['und'][0]['amount'], 2, '.', ',') . "&nbsp;";
                print $product->commerce_price['und'][0]['currency_code'];
                ?>
            </div>
          <?php endif; ?>
          <?php
          if (isset($product->field_rezolucija['und'][0]['tid'])):
            ?>

            <?php
            if (isset($product->field_image_tv['und'][0]['uri'])):
              $rezolucija = taxonomy_term_load($product->field_rezolucija['und'][0]['tid']);
              ?>
              <div class="rezolucija">
                  <span class="field-title">Rezolucija</span>
                  <?php
                  print $rezolucija->name;
                  ?>
              </div>
          </div>
          <div class="clear"></div>
          <?php
        endif;
        ?>

        <hr>
      <?php endif; ?>
  </article>
  <?php
elseif ($view_mode == "full"):
  $televizor = commerce_product_load($field_televizor[0]['product_id']);
  ?>
  <article class="product">
      <h4>
          <?php print $title; ?>
      </h4>
      <?php if (isset($televizor->field_image_tv['und'][0]['uri'])): ?>
        <div class="image inline">
            <img class="img-responsive" src="<?php print file_create_url($televizor->field_image_tv['und'][0]['uri']); ?>" />

        </div>
      <?php endif; ?>
      <div class="inline">
          <div class="price">
              <span class="field-title">Price: </span>  <?php print $televizor->commerce_price['und'][0]['amount']; ?> <?php //print $televizor->commerce_price['und'][0]['currency'];                                                     ?>
          </div>
          <div>
              <?php
              $form_id = commerce_cart_add_to_cart_form_id(array($televizor->product_id));
              $line_item = commerce_product_line_item_new($televizor);
              $line_item->data['context']['product_ids'] = array($televizor->product_id);
              $form = drupal_get_form($form_id, $line_item);
              print drupal_render($form);
              ?>
          </div>
      </div>
      <div class="clear"></div>
      <a href="javascript:void(0)" id="myid">Javascript call</a>
      <div class="ajax-result">

      </div>
      <?php if (isset($body[0]['value'])): ?>
        <div class="description">
            <span class="field-title">Description: </span> <?php print $body[0]['value']; ?>
        </div>
      <?php endif; ?>
  </article>
<?php endif; ?>




