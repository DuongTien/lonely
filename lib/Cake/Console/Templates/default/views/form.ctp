<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.Console.Templates.default.views
 * @since         CakePHP(tm) v 1.2.0.5234
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>

<table border="0" width="100%" cellpadding="0" cellspacing="0">
    <tbody>
        <tr valign="top">
            <td>
                <div id="step-holder">
                    <div class="step-no">1</div>
                    <div class="step-dark-left"><a href="">Add product details</a></div>
                    <div class="step-dark-right">&nbsp;</div>
                    <div class="step-no-off">2</div>
                    <div class="step-light-left">Select related products</div>
                    <div class="step-light-right">&nbsp;</div>
                    <div class="step-no-off">3</div>
                    <div class="step-light-left">Preview</div>
                    <div class="step-light-round">&nbsp;</div>
                    <div class="clear"></div>
                </div>
                <?php echo "<?php echo \$this->Form->create('{$modelClass}'); ?>\n"; ?>

                <table border="0" width="100%" cellpadding="0" cellspacing="0" id="id-form">

                <?php
                    foreach ($fields as $field) {
                        if (strpos($action, 'add') !== false && $field === $primaryKey) {
                            continue;
                        } elseif (!in_array($field, array('created', 'modified', 'updated'))) {
                            echo "\t\t\t\t\t<tr>\n";
                                echo "\t\t\t\t\t\t<th valign=\"top\">$field</th>\n";
                                echo "\t\t\t\t\t\t<td>\n";
                                echo "\t\t\t\t\t\t\t<?php echo \$this->Form->input('{$field}',array('label'=>false, 'div' => false, 'class' => 'inp-form'));?>\n";
                                echo "\t\t\t\t\t\t</td>\n";
                            echo "\t\t\t\t\t</tr>\n";
                            echo "\n";
                        }
                    }
                ?>

                    <tr>
                        <th>&nbsp;</th>
                        <td valign="top">
                            <?php
                            echo "<?php echo \$this->Form->submit(__('Submit'),array('class' => 'form-submit','label'=>false, 'div' => false)); ?>\n";
                            ?>
                            <input type="button" value="" class="form-reset" onclick="location.href='<?php echo "<?php echo \$this->Html->url(array('action'=>'index')); ?>"?>';">
                        </td>
                        <td></td>
                    </tr>
                </table>
                <?php
                echo "<?php echo \$this->Form->end(); ?>\n";
                ?>
            </td>

        </tr>
    </tbody>
</table>
