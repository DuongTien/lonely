
<!--view index-->
<div id="table-content">
    <!--  start product-table ..................................................................................... -->
    <form id="mainform" action="">
        <table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
            <tbody>
            <tr>
                <?php foreach ($fields as $field): ?>
                    <th class="table-header-repeat line-left"><?php echo "<?php echo \$this->Paginator->sort('{$field}'); ?>"; ?></th>
                <?php endforeach; ?>
                <th class="actions table-header-repeat line-left" width="12%" ><?php echo "<?php echo __('Actions'); ?>"; ?></th>
            </tr>

            <?php
            echo "<?php foreach (\${$pluralVar} as \${$singularVar}): ?>\n";
            echo "\t\t<tr>\n";
            foreach ($fields as $field) {
                $isKey = false;
                if (!empty($associations['belongsTo'])) {
                    foreach ($associations['belongsTo'] as $alias => $details) {
                        if ($field === $details['foreignKey']) {
                            $isKey = true;
                            echo "\t\t\t<td>\n\t\t\t<?php echo \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?>\n\t\t\t</td>\n";
                            break;
                        }
                    }
                }
                if ($isKey !== true) {
                    echo "\t\t\t<td><?php echo h(\${$singularVar}['{$modelClass}']['{$field}']); ?>&nbsp;</td>\n";
                }
            }

            echo "\t\t\t<td class=\"actions options-width\" style=\"text-align:center\">\n";
            echo "\t\t\t\t<?php echo \$this->Html->link(\$this->Html->image('../admin/images/system/view.png'), array('action' => 'view', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('escape' => false)); ?>\n";
            echo "\t\t\t\t<?php echo \$this->Html->link(\$this->Html->image('../admin/images/system/edit.png'), array('action' => 'edit', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('escape' => false)); ?>\n";
            echo "\t\t\t\t<?php echo \$this->Form->postLink(\$this->Html->image('../admin/images/system/delete.png'), array('action' => 'delete', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('escape' => false), __('Are you sure you want to delete # %s?', \${$singularVar}['{$modelClass}']['{$primaryKey}'])); ?>\n";
            echo "\t\t\t</td>\n";
            echo "\t\t\t</tr>\n";

            echo "<?php endforeach; ?>\n";
            ?>

            </tbody>
        </table>
        <!--  end product-table................................... -->
    </form>
</div>
