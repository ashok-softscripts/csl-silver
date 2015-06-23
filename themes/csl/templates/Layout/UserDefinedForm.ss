<% if Parent.ClassName == 'Program' %>
<% include ProgramForm %>
<% else %>
<% include GeneralForm %>
<% end_if %>
