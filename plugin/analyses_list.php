<?php

function improv_analysis_analyses_list()
{
    ?>
    <div class="wrap">
      <h1>Improv Analysis Administration Panel</h1>
      <?php
      
      global $wpdb;    
      $result = $wpdb->get_results( "SELECT * FROM improv_analysis_analyses");
      ?><table>
      <tr>
        <th>Performer</th>
        <th>Title</th>
        <th>Duration(sec)</th>
        <th>Events</th>
        <th>Instruments</th>
        <th>Performer count</th>
        <th>Comment</th>
        <th>Links</th>
      </tr>
      <?php
      if(count($result) == 0 &&
         strpos($wpdb->last_error, "improv_analysis_analyses' doesn't exist"))
      {
        ?>Have you created the database tables?<?php
      }

            foreach ($result as $key => $value) {
              ?><tr>
                <td><?php echo $value->performer; ?></td>
                <td><?php echo $value->title; ?></td>
                <td><?php echo $value->duration; ?></td>
                <?php $event_count =
                  improv_analysis_get_event_count($value->id); ?>
                <td><?php echo $event_count; ?></td>
                <td><?php echo $value->instruments; ?></td>
                <td><?php echo $value->performer_count; ?></td>
                <td><?php echo $value->comment; ?></td>
                <td>
                  <a href="<?php echo
                   improv_analysis_analysis_edit_link($value->url_id); 
                   ?>">Edit</a>
                   <a href="#">View</a>
                </td>
              </tr><?php
            }
      ?></table><?php
      ?>
    </div>
    <?php
}
?>