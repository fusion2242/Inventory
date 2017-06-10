            <table class="table datatable-basic">
              <thead>
                <tr>
                  <th>Account</th>
                  <th>Account Sub Head</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>

                  <?php foreach ($sub_data as $value): ?>
                  <tr>
                     <td><?php echo $name[0]->account_name;?></td>
                     <td><?php echo $value->account_name;?></td>
                     <td><?php echo $value->status;?></td> 
                  </tr>
                <?php endforeach?>
              </tbody>
            </table>