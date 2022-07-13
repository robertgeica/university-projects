// exemplul l-am luat din acest video explicativ al algoritmului round robin pentru a ma asigura ca output-ul este corect https://www.youtube.com/watch?v=aWlQYllBZDs&ab_channel=ouchouchbaby


const timeQuantum = 3;

// lista proceselor
let processes = [
  {
    processName: 'P1',
    arivalTime: 0,
    burstTime: 5,
  },
  {
    processName: 'P2',
    arivalTime: 1,
    burstTime: 3,
  },
  {
    processName: 'P3',
    arivalTime: 3,
    burstTime: 6,
  },
  {
    processName: 'P4',
    arivalTime: 5,
    burstTime: 1,
  },
  {
    processName: 'P5',
    arivalTime: 6,
    burstTime: 4,
  },
];

let totalBurstTime = 0;
const requestQueue = [];
const runningOrder = [];

// verificam daca array-ul requestQueue este gol
if (requestQueue.length == 0) {

  // adaugam primul process (elementul cu index 0) din lista de procese
  requestQueue.push(processes[0]);
  // stergem procesul cu index 0 din array ul de procese
  processes.shift();


  console.log(`Lista initiala a tuturor proceselor:`, processes);

  // executam aceasta secventa de cod pana cand array-ul responsabil cu executia proceselor este gol
  while (requestQueue.length !== 0) {
    
    // parcurgem array-ul
    requestQueue.forEach((process) => {
    
      // obiect gol care ne va ajuta manipulam mai usor procesele
      let tempProcess = {}; 
      console.log('Procesul care se ruleaza:', requestQueue[0]);
      
      
      console.log('Lista cu procesele din queue inainde de executarea procesului:', requestQueue);
      console.log('Lista tuturor proceselor:', processes);

      let newBurstTime;
      if (requestQueue[0].burstTime - timeQuantum < 0) {
        newBurstTime = 0;
      } else {
        newBurstTime = requestQueue[0].burstTime - timeQuantum;
      }

      // actualizam burstTime-ul total
      totalBurstTime += requestQueue[0].burstTime - newBurstTime;
      tempProcess = {
        ...requestQueue[0], // copiem toate proprietatile si valorile obiectului process in obiectul tempProcess
        burstTime: newBurstTime,
      };
      runningOrder.push(tempProcess.processName);
      requestQueue.shift(); // eliminam task-ul curent din lista de asteptare

      if(processes.length !== 0) {

        let temp = 0; // variabila temporara pentru a verifica cate procese sunt adaugate in requestQueue
        for (let i = 0; i < processes.length; i++) {
          if (processes[i].arivalTime <= totalBurstTime) {
            requestQueue.push(processes[i]);
            temp++;
          }
          // console.log(totalBurstTime, processes, requestQueue)
        }
        processes.splice(0, temp); // folosim variabila temp pentru a elimina primele temp procese din lista tuturor proceselor
        
        temp = 0; // resetam variabila
      }
      // verificam daca task-ul ulterior nu este finalizat
      if (tempProcess.burstTime !== 0) {
        requestQueue.push(tempProcess); // il adaugam la finalul array-ului
      }
      console.log('Lista cu procesele din queue dupa executarea procesului:', requestQueue);
      console.log('Lista tuturor proceselor:', processes);

      console.log(`----------`)

    });
  }
}


console.log(`Ordinea in care au fost rulate procesele: ${runningOrder}`)