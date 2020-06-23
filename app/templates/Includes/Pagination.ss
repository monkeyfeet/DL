<% if $MoreThanOnePage %>
    <p class="pagination">
        <% if $NotFirstPage %>
            <a class="prev button red readmore" href="$PrevLink" title="View the previous page">&laquo; Prev</a>
        <% end_if %>

        <% loop $PaginationSummary(4) %>
            <% if $CurrentBool %>
                <span>$PageNum</span>
            <% else %>
                <% if $Link %>
                    <a class="button" href="$Link">$PageNum</a>
                <% else %>
                    <span>...</span>
                <% end_if %>
            <% end_if %>
        <% end_loop %>

        <% if $NotLastPage %>
            <a class="next button readmore" href="$NextLink" title="View the next page">Next &raquo;</a>
        <% end_if %>
    </p>
<% end_if %>