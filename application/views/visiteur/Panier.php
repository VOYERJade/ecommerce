<!DOCTYPE html>

<div align = "center"><h2><?php echo $TitreDeLaPage ?></h2></div>

        <?php echo form_open('visiteur/ModifierUnProduit'); ?>

        <table cellpadding="6" cellspacing="1" style="width:70%" border="1">

                <tr>
                        <th>Quantité</th>
                        <th>Libelle</th>
                        <th>Prix</th>
                        <th>Total</th>
                        <th></th>
                </tr>

                <?php $i = 1; ?>

                <?php foreach ($this->cart->contents() As $unProduit): ?>
                <?php echo form_hidden($i.'[rowid]', $unProduit['rowid']); ?>

                <tr>
                        <td><?php echo form_input(array('name' => $i.'[qty]', 'value' => $unProduit['qty'])); ?></td>
                        <td><?php echo $unProduit['name']; ?></td>
                        <td><?php echo $this->cart->format_number($unProduit['price']); ?></td>
                        <td><?php echo $this->cart->format_number($unProduit['subtotal']); ?>€</td>
                        <?php echo form_Close();?>
                        <?php echo form_Open();?>
                        <td><?php echo anchor('visiteur/SupprimerProduit/'.$unProduit['rowid'], 'Supprimer');?></td>;
                        <?php echo form_Close();?>
                </tr>

                <?php $i++; ?>

                <?php endforeach; ?>

                <tr>
                        <td colspan="2"> </td>
                        <td class="right"><strong>Total</strong></td>
                        <td class="right"><?php echo $this->cart->format_number($this->cart->total()); ?>€</td>
                </tr>


        </table>

        <p><?php echo form_submit('btnModifier', 'Modifier');?>

        </br>

        <?php
          echo '<h4>'.anchor('visiteur/CatalogueAvecPagination','Retour au Catalogue').'</h4>';
        ?>