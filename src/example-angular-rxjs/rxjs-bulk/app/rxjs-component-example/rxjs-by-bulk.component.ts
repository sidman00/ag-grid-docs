import {Component} from "@angular/core";

import {GridOptions} from "ag-grid";
import {MockServerService} from "./mockServer.service";

@Component({
    selector: 'my-app',
    templateUrl: './rxjs-by-bulk.component.html',
    providers: [MockServerService]
})
export class RxJsComponentByFullSet {
    gridOptions: GridOptions;
    initialRowDataLoad$;
    rowDataUpdates$;

    constructor(mockServerService: MockServerService) {
        this.initialRowDataLoad$ = mockServerService.initialLoad();
        this.rowDataUpdates$ = mockServerService.allDataUpdates();

        this.gridOptions = <GridOptions> {
            enableRangeSelection: true,
            enableColResize: true,
            columnDefs: this.createColumnDefs(),

            deltaRowDataMode: true,
            getRowNodeId: function (data) {
                // the code is unique, so perfect for the id
                return data.code;
            },

            onGridReady: () => {
                this.initialRowDataLoad$.subscribe(
                    rowData => {
                        // the initial full set of data
                        // note that we don't need to un-subscribe here as it's a one off data load
                        if (this.gridOptions.api) { // can be null when tabbing between the examples
                            this.gridOptions.api.setRowData(rowData);
                        }

                        // now listen for updates
                        // we're using deltaRowDataMode this time, so although we're setting the entire
                        // data set here, the grid will only re-render changed rows, improving performance
                        this.rowDataUpdates$.subscribe((newRowData) => {
                            if (this.gridOptions.api) { // can be null when tabbing between the examples
                                this.gridOptions.api.setRowData(newRowData)
                            }
                        });
                    }
                );
                this.gridOptions.api.sizeColumnsToFit();
            }
        };
    }

    private createColumnDefs() {
        return [
            {headerName: "Code", field: "code", width: 70},
            {headerName: "Name", field: "name", width: 280},
            {
                headerName: "Bid", field: "bid", width: 100,
                cellClass: 'cell-number',
                valueFormatter: this.numberFormatter,
                cellRenderer: 'animateShowChange'
            },
            {
                headerName: "Mid", field: "mid", width: 100,
                cellClass: 'cell-number',
                valueFormatter: this.numberFormatter,
                cellRenderer: 'animateShowChange'
            },
            {
                headerName: "Ask", field: "ask", width: 100,
                cellClass: 'cell-number',
                valueFormatter: this.numberFormatter,
                cellRenderer: 'animateShowChange'
            },
            {
                headerName: "Volume", field: "volume", width: 100,
                cellClass: 'cell-number',
                cellRenderer: 'animateSlide'
            }
        ]
    }

    numberFormatter(params) {
        if (typeof params.value === 'number') {
            return params.value.toFixed(2);
        } else {
            return params.value;
        }
    }
}