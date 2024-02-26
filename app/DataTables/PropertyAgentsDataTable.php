<?php

namespace App\DataTables;

use App\Models\PropertyAgent;
use App\Models\PropertyAgents;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PropertyAgentsDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->editColumn('property', function (PropertyAgents $propertyAgents) {
                return (!empty($propertyAgents->property)) ? $propertyAgents->property->property_name ?? '-' : '-';
            })
            ->editColumn('agent', function (PropertyAgents $propertyAgents) {
                return (!empty($propertyAgents->agent)) ? $propertyAgents->agent->name ?? '-' : '-';
            })
            ->editColumn('updated_at', function (PropertyAgents $propertyAgents) {
                return $propertyAgents->updated_at->format('d M Y, h:i a');
            })
            ->addColumn('action', function (PropertyAgents $propertyAgents) {
                return view('property_agents.columns._actions', compact('propertyAgents'));
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(PropertyAgents $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('propertyagents-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('rt' . "<'row'<'col-sm-12 col-md-5'l><'col-sm-12 col-md-7'p>>",)
                    ->addTableClass('table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer text-gray-600 fw-semibold')
                    ->setTableHeadClass('text-start text-muted fw-bold fs-7 text-uppercase gs-0')
                    ->orderBy(0)
                    ->drawCallback("function() {" . file_get_contents(resource_path('views/property_agents/columns/_draw-scripts.js')) . "}");
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('property_agent_id'),
            Column::make('property','property_id'),
            Column::make('agent','agent_id'),
            Column::make('updated_at'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-end text-nowrap'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'PropertyAgents_' . date('YmdHis');
    }
}
