//
//  DataStore.swift
//  ToDo
//
//  Created by Robert on 20/04/2022
//

import Foundation
import SwiftUI
import Combine

struct Task : Identifiable {
    var id = String()
    var taskItem = String()
}

class TaskDataStore: ObservableObject {
    @Published var tasks = [Task]()
}
